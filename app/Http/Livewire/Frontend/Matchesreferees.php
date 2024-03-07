<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Group;
use Livewire\WithPagination;
use App\Models\GameTeam;
use App\Models\League;
use App\Models\Arbitrator;
use App\Models\Tournament;
use App\Models\Match;

class Matchesreferees extends Component
{

    use WithPagination;
    public $match;
    public $league;
    public $tournament;
    public $idPartido;
    public $documentoId;
    public $session_id;
     //Query
    public $query = '';
    public $cant = 5;
    protected $queryString = [
        'cant' => ['except' => 5],
        'query' => ['except' => '']
    ];
    public function updatingQuery()
    {
        $this->resetPage();
    }
    public function resetFilter(){
        $this->reset(['query','date']);
    }

    public function mount($leagueSlug,$tournamentSlug,$id_partidoresumen){

        $this->league = League::where('slug', $leagueSlug)->firstOrFail();
        $this->tournament = Tournament::where('league_id', $this->league->id)->where('slug', $tournamentSlug)->firstOrFail();
        $this->partido = Match::where('id', $id_partidoresumen)->firstOrFail();
        $this->arbitro = Arbitrator::where('id',  $this->partido->arbitrator_id)->first();



        $this->teams = GameTeam::where(function ($query) {
            $query->whereHas('matchesAsGameTeamOne')->orWhereHas('matchesAsGameTeamTwo');
        })->get();
        $this->groups = Group::whereHas('matches')->get();

        //$this->idPartido = $matchId;
        //$this->match = Match::where('id', $this->idPartido)->firstOrFail();
    }

    public function chargingData(){
        $query = Match::query();
         return $query->where('tournament_id', $this->tournament->id)->where('arbitrator_id',  $this->partido->arbitrator_id)->orderBy('id', 'desc')->where('status_id',2)->paginate($this->cant);


        //  $partido = Match::where('id',$id_partidoresumen)->firstOrFail();
        //  $arbitro=Arbitrator::where('id',$partido->arbitrator_id)->first();

        //  //$ultimosPartidos = Match::where('arbitrator_id', $partido->arbitrator_id)->orderBy('id', 'desc')->take(3)->get();

        // $ultimosPartidos = Match::where('arbitrator_id', $partido->arbitrator_id)
        // ->where('tournament_id', $tournament->id)
        // ->orderBy('id', 'desc')
        // ->take(3)
        // ->get();

    }





    public function render()
    {
        $matches = $this->chargingData();
        //$lastmatches = Match::where('arbitrator_id', $this->match->arbitrator_id)->orderBy('id', 'desc')->where('status_id',2)->paginate($this->cant);
        return view('livewire.frontend.matchesreferees',compact('matches'));
    }
}
