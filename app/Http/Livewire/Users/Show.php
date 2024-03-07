<?php

namespace App\Http\Livewire\Users;

use App\Models\Player;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Image;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    use WithFileUploads;
    use WithPagination;

    //Edit
    public $user;
    public $roles;
    public $user_image;
    public $image;
    public $name;
    public $email;
    public $password;
    public $user_password;
    public $role;
    public $user_role;
    protected function rules(){
        return [
            'user.image'=>'image|max:2048|nullable',
            'user.name'=>'',
            'user.email'=>'',
//            'user.password'=>'min:8',
//            'user.role'=>''
        ];
    }
    protected $paginationTheme ='bootstrap';

    protected $listeners = [
      'usersShowChange',
      'usersShowRender'=>'render'
    ];

    public $readyToLoad = false;
    public $maintenance = false;
    public $query = '';
    public $cant = '10';

    protected $queryString = [
        'cant'=>['except'=>'10'],
        'query'=>['except'=>'']
    ];

    public function updatingQuery(){
        $this->resetPage();
    }
    public function hydrate(){
        $this->emit('usersShowHydrate');
    }

    public function userShowChange($value, $key){
        $this->$key = $value;
    }

    public function readyToLoad(){
        $this->readyToLoad= true;
    }
    public function mount(){
        $this->roles = Role::whereIn('name', ['Admin', 'Editor'])->get();
    }
    public function render()
    {
        if ($this->readyToLoad){
            $users = $this->chargingData();
        }else{
            $users = [];
        }
        return view('livewire.users.show', compact('users'));
    }
    public function chargingData(){
        return User::where(function($query){
           if ($this->query){
               $query->where('name','like','%'.$this->query.'%');
           }
        })->paginate($this->cant);
    }
    public function edit(User $user){
        $this->user = $user;
        $this->user_image = $this->user->image;
//        $this->user_role = $user->getRoleNames();
        $this->user_password = $user->password;
//        dd($this->user_role);
    }
    public function  update(){
        if ($this->image){
            \Illuminate\Support\Facades\File::delete(public_path('uploads/users/'.$this->user->image));
            $file_name = Str::slug($this->user->name).'-'.Carbon::now()->locale('co')->format('Y-m-d-H-i-s').'.'.$this->image->getClientOriginalExtension();
            Image::make($this->image)->resize(400, 400)->save(public_path('uploads/users/' . $file_name, 50));
        }else{
            $file_name = $this->user_image;
        }
        $this->user->image = $file_name;
        if ($this->password){
            $this->user->password = bcrypt($this->password);
        }
//        else{
//            $this->user->password = $this->user_password;
//        }
        $this->user->save();
        if ($this->role){
            $this->user->roles()->sync($this->role);
        }

        $this->emitTo('users.show','render');
        $this->emit('alert',__('User updated!'),'#edit');
        $this->emit('usersShowRender');
    }
}
