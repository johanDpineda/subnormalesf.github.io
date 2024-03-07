<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;


class Show extends Component
{
    public $playersCount = 0;
    public $tournamentsCount;
    public $leaguesCount;
    public $arbitratorsCount;
    public $ArbitrosGrafia;
    public $GoleadoresGrafica;
    public $selectedTournamentId;
    public $selectedTournamentIdGOLEADORES;
    public $selectedTournamentIdARBITRO;
    public $selectedTournamentIdVALLAS;
    public $tournaments;
    public $defaultData;
    public $defaultgolesData;
    public $TablePointsGrafica = [];
    public $noDataMessage;
    public $leagueSelected = false;
    public $leagues;
    public $league_id;
    public $showChart = true;
    public $query = '';
    public $cant = '10';




    public $loggedUser;
    public $loggedUserRole;

//    Matches

protected $listeners = [
    'HomeShowChange',
    'HomeShowRender'=>'render'
];

public function hydrate(){
    $this->emit('HomeShowHydrate');
}

public function HomeShowChange($value, $key){
    $this->$key = $value;
}



    public function render()
    {
        return view('livewire.home.show');
    }
}
