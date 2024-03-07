<?php

namespace App\Http\Livewire\ControlTerrenos;


use App\Models\Controlterreno;
use App\Models\Datoscaminante;

use Illuminate\Support\Facades\Mail;
use App\Mail\ActualizacionMacromedidor;

use App\Models\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class Show extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $listeners = [
        'CourtsShowChange',
        'CourtsShowRender'=>'render'
    ];
    public $readyToLoad = false;
    public $maintenance = false;
    public $openMapModal;
    public $openMapModalobservaciones;
    public $query = '';
    public $cant = '10';
    protected $queryString = [
        'cant'=> ['except'=>'10'],
        'query'=> ['except'=>'']
    ];
    //User login
    public $loggedUser;
    public $loggedUserRole;

    public function updatingQuery()
    {
        $this->resetPage();
    }
    public function CourtsShowChange($value, $key)
    {
        $this->$key = $value;
    }
    public function readyToLoad()
    {
        $this->readyToLoad = true;
    }
    public function render()
    {
        if ($this->readyToLoad){
            $terreno = $this->chargingData();
        }else{
            $terreno = [];
        }
        return view('livewire.control-terrenos.show',compact('terreno'));
    }
    public function chargingData()
    {
        $terreno = Controlterreno::where(function ($query){
            if ($this->query){
                $query->where('code_macromedidor','like','%'.$this->query.'%');
            }
        })->paginate($this->cant);

        return $terreno;
    }
    public function closeAndClean()
    {
        $this->reset([

            'openMapModal',



        ]);

        $this->resetValidation([

            'openMapModal',


        ]);
    }






    //Edit

    public $control_terreno;
    public $code_macromedidor;


    public $User;


    protected function rules(){
        return [
            'image'=>'',
            'court.name'=>'',
            'court.address'=>'',
            'court.league_id'=>'',
            'court.is_active'=>''
        ];
    }
    public function mount()
    {
        $this->User = User::all();

        $this->loggedUser = Auth::user();
        $this->loggedUserRole = $this->loggedUser->getRoleNames()->first();
    }
    public function edit(Controlterreno $control_terreno){
        $this->control_terreno = $control_terreno;
        $this->code_macromedidor = $this->control_terreno->code_macromedidor;



    }
    public function update()
    {

        if ($this->code_macromedidor){
            $this->control_terreno->code_macromedidor = $this->code_macromedidor;
        }




        $this->control_terreno->save();
          // Envío de correo electrónico
          $usuariosGrupoSocial = User::role('Grupo Social')->get();
          foreach ($usuariosGrupoSocial as $usuario) {
              Mail::to($usuario->email)->send(new ActualizacionMacromedidor($this->control_terreno));
          }
        $this->emitTo('control-terrenos.show','render');
        $this->emit('alert',__('Updated macro meter code'),'#edit');
        $this->emit('CourtsShowRender');
        $this->emit('CourtsShowRender');
    }


    public $selectedCaminante;

    public function openMapModal($caminanteId)
    {
        $this->selectedCaminante = Controlterreno::findOrFail($caminanteId);
        $this->emit('openMapModal');
        $this->closeAndClean();

    }

    public $selectedCaminanteobservaciones;

    public function openMapModalobservaciones($caminanteId)
    {
        $this->selectedCaminanteobservaciones = Controlterreno::findOrFail($caminanteId);
        $this->emit('openMapModalobservaciones');
        $this->closeAndClean();

    }

    public $controlterrenos_codemacro;






}
