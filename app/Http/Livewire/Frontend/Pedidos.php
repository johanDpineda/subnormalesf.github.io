<?php


namespace App\Http\Livewire\Frontend;

use App\Models\Productos;
use Twilio\Rest\Client;

use App\Models\Store;
use App\Models\StoreProduct;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\WithFileUploads;


class Create extends Component
{
    use WithFileUploads;
    public $name;
    public $address;
    public $amount;
    public $order_date;
    public $description;
    public $numerocel;
    public $products_id;
    public $productos;
    public $categoryproduct;

    

    //User login
    public $loggedUser;
    public $loggedUserRole;
    protected $listeners = [
        'CourtsCreateChange'
    ];
    protected function rules(){
        $rules= [
            'name' => 'required',
            'address' => 'required',
            'amount' => 'required',
            'order_date' => 'required|date',
            'description' => 'required',
            'carnumeroceleer' => 'nullable',
            'products_id' => 'required|exists:products,id',

//            'league_id'=>'required'
        ];
       
        return $rules;
    }
    protected $messages = [
       
        'name.required'=>'Name field is required',
        'address.required'=>'Address field is required',
        'amount.required'=>'amout field is required',
        'description.required'=>'description field is required',
       
        'products_id.required'=>'Products is required'
    ];
    public function hydrate(){
        $this->emit('CourtsCreateHydrate');
    }
    public function CourtsCreateChange($value, $key){
        $this->$key = $value;
    }
    public function closeAndClean(){
        $this->reset([
            'name',
            'address',
            'amount',
            'order_date',
            'description',
          
            'products_id'
        ]);
        $this->resetValidation([
            'name',
            'address',
            'amount',
            'order_date',
            'description',
            
            'products_id'
        ]);
    }
     public function mount(){
            
        $this->productos = Productos::all();
       
 
     }
    public function save(){
        $this->validate();
        
        $products = new StoreProduct();
        $products->name=$this->name;
        $products->address=$this->address;
        $products->amount=$this->amount;
        $products->order_date=$this->order_date;
       
        $products->description = $this->description;
        $products->numerocel = $this->numerocel;
        

        $products->products_id = $this->products_id;

    //        $court->league_id = $this->league_id;

       
        $products->save();

       
      

        $this->emitTo('Productorganizar.create','render');
        $this->emit('alert',__('Product Court!'),'#create');
        $this->emit('CourtsShowRender');
        $this->closeAndClean();
    }




    public function render()
    {
        return view('livewire.frontend.pedidos');
    }


}

