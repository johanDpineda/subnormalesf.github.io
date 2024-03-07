<?php

namespace App\Http\Livewire\Frontend;

use App\Models\GameTeam;
use App\Models\League;
use App\Models\TablePoint;
use App\Models\Tournament;
use Livewire\Component;
use Livewire\WithPagination;

class GoalKeepers extends Component
{

    use WithPagination;
    protected $listeners = [
        'GoalKeepersShowChange',
    ];
    //Mount
    public $league;
    public $tournament;
    public $teams;

    //Query
    public $query = '';
    public $cant = 10;
    public $team_id;
    protected $queryString = [
        'cant' => ['except' => 10],
        'query' => ['except' => '']
    ];
    public function hydrate(){
        $this->emit('GoalKeepersShowHydrate');
    }
    public function GoalKeepersShowChange($value, $key){
        $this->$key = $value;
    }
    public function mount($leagueSlug, $tournamentSlug)
    {
        $this->league = League::where('slug', $leagueSlug)->firstOrFail();
        $this->tournament = Tournament::where('slug', $tournamentSlug)->firstOrFail();
        $this->teams = GameTeam::where(function ($query) {
            $query->whereHas('tablePoints', function ($query) {
                $query->where('tournament_id', $this->tournament->id);
            });
        })->get();
    }
    public function resetFilter(){
        $this->reset(['team_id']);
    }

    public function chargingData(){
        $query = TablePoint::query();

        if ($this->team_id) {
            $query->where(function ($subQuery) {
                $subQuery->where('game_team_id', $this->team_id);
            });
            $this->resetPage();
        }


        //Codigo de filtrado de goalkeepers

        $goalKeepers = $query->when($this->team_id,function($query){
            return $query->where('game_team_id', $this->team_id);
        })->where('tournament_id', $this->tournament->id)
            ->select('*','game_teams.name as tname', 'game_teams.logo')
            ->join('game_teams', 'table_points.game_team_id', '=', 'game_teams.id')
            //->with('teams')
            ->orderBy('goals_against', 'asc')
            ->orderBy('goals_difference', 'desc')
            ->orderBy('tname', 'asc')
            //->orderBy('name', 'desc')
            ->paginate($this->cant);

        // Obtén los IDs de los equipos filtrados
        $filteredTeamIds = $goalKeepers->pluck('id')->toArray();

         // Obtiene los índices de los equipos en la tabla original sin filtrar
         $originalTeamgoalkeepers = TablePoint::when($this->team_id,function($query){
            //return $query->where('game_team_id', $this->team_id);
        })->where('tournament_id', $this->tournament->id)
            ->select('*', 'game_teams.name as tname','game_teams.logo')
            ->join('game_teams', 'table_points.game_team_id', '=', 'game_teams.id')
            //->with('teams')
            ->orderBy('goals_against', 'asc')
            ->orderBy('goals_difference', 'desc')
            ->orderBy('tname', 'asc')
            //->orderBy('name', 'desc')
            ->get();
        $originalTeamIndices = $originalTeamgoalkeepers->pluck('id')->toArray();


         // Crea un arreglo de índices que corresponda a los equipos filtrados
         $filteredTeamIndices = [];
         foreach ($filteredTeamIds as $filteredTeamId) {
             $index = array_search($filteredTeamId, $originalTeamIndices);
             if ($index !== false) {
                 $filteredTeamIndices[] = $index + 1; // Suma 1 para obtener la posición
             }
         }

         // Asigna los números de posición a los equipos filtrados
        foreach ($goalKeepers as $key => $goalKeeper) {
            $goalKeeper->position = $filteredTeamIndices[$key];
        }





         //dd($teamPoints);
         return $goalKeepers;





        // $goalKeepers = $query->where('tournament_id', $this->tournament->id)->orderBy('goals_against', 'ASC')->paginate($this->cant);


        // // Obtén los índices de los equipos en la tabla original sin filtrar
        // $originalGoalKeepers = TablePoint::where('tournament_id', $this->tournament->id)->orderBy('goals_against', 'ASC')->get();

        // $originalGoalKeeperIndices = $originalGoalKeepers->pluck('id')->toArray();

        // // Crea un arreglo de índices que corresponda a los equipos filtrados
        // $filteredGoalKeeperIndices = [];
        // foreach ($goalKeepers as $goalKeeper) {
        //     $index = array_search($goalKeeper->id, $originalGoalKeeperIndices);
        //     if ($index !== false) {
        //         $filteredGoalKeeperIndices[] = $index + 1; // Suma 1 para obtener la posición
        //     }
        // }

        // // Asigna los números de posición a los equipos filtrados
        // foreach ($goalKeepers as $key => $goalKeeper) {
        //     $goalKeeper->position = $filteredGoalKeeperIndices[$key];
        // }

        // return $goalKeepers;

    }
    public function render()
    {
        $goalKeepers = $this->chargingData();
        return view('livewire.frontend.goal-keepers',compact('goalKeepers'));
    }
}
