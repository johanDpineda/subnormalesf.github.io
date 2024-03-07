<?php

namespace App\Http\Livewire\Frontend;

use App\Models\GameTeam;
use App\Models\Group;
use App\Models\League;
use App\Models\TablePoint;
use App\Models\Tournament;
use Livewire\Component;
use Livewire\WithPagination;

class TablePoints extends Component
{
    use WithPagination;
    //Mount
    public $league;
    public $tournament;
    public $teams;
    public $groups;

    public $filteredTeamPosition;

    public $teamsfiltro;


//    public $teamPoints;
    //Query
    public $query = '';
    public $cant = 10;
    public $team_id;
    public $group_id;
    protected $queryString = [
        'cant' => ['except' => 10],
        'query' => ['except' => '']
    ];
    protected $listeners = [
        'TablePointsShowChange',
    ];
    public function hydrate(){
        $this->emit('TablePointsShowHydrate');
    }
    public function TablePointsShowChange($value, $key){
        $this->$key = $value;
    }
    public function mount($leagueSlug, $tournamentSlug)
    {
        $this->league = League::where('slug', $leagueSlug)->firstOrFail();
        $this->tournament = Tournament::where('slug', $tournamentSlug)->firstOrFail();
        try {
            $group =Group::where('tournament_id',$this->tournament->id)->first();
            $this->group_id = $group->id;
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
        $this->teams = GameTeam::where(function ($query) {
            $query->whereHas('tablePoints', function ($query) {
                $query->where('tournament_id', $this->tournament->id);
            });
        })->get();
        $this->groups = Group::where(function ($query) {
            $query->whereHas('tablePoints', function ($query) {
                $query->where('tournament_id', $this->tournament->id);
            });
        })->get();
    }
    public function updatingQuery()
    {
        $this->resetPage();
    }
    public function resetFilter(){
        $this->reset(['team_id','group_id']);
        try {
            $group =Group::where('tournament_id',$this->tournament->id)->first();
            $this->group_id = $group->id;
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
    }
    public function chargingData(){
        $query = TablePoint::query();

        $teamPoints = $query->when($this->team_id,function($query){
            return $query->where('game_team_id', $this->team_id);
        })->when($this->group_id,function($query){
            return $query->where('group_id', $this->group_id);
        })->where('tournament_id', $this->tournament->id)
            ->select('*','game_teams.name as tname', 'game_teams.logo')
            ->join('game_teams', 'table_points.game_team_id', '=', 'game_teams.id')
            //->with('teams')
            ->orderBy('total_points', 'desc')
            ->orderBy('goals_difference', 'desc')
            ->orderBy('goals_against', 'asc')
            ->orderBy('goals_scored', 'desc')
            ->orderBy('tname', 'asc')
            //->orderBy('name', 'desc')
            ->paginate($this->cant);

        // Obtén los IDs de los equipos filtrados
        $filteredTeamIds = $teamPoints->pluck('id')->toArray();

        // Obtiene los índices de los equipos en la tabla original sin filtrar
        $originalTeamPoints = TablePoint::when($this->team_id,function($query){
            //return $query->where('game_team_id', $this->team_id);
        })->when($this->group_id,function($query){
            return $query->where('group_id', $this->group_id);
        })->where('tournament_id', $this->tournament->id)
            ->select('*', 'game_teams.name as tname','game_teams.logo')
            ->join('game_teams', 'table_points.game_team_id', '=', 'game_teams.id')
            //->with('teams')
            ->orderBy('total_points', 'desc')
            ->orderBy('goals_difference', 'desc')
            ->orderBy('goals_against', 'asc')
            ->orderBy('goals_scored', 'desc')
            ->orderBy('tname', 'asc')
            //->orderBy('name', 'desc')
            ->get();
        $originalTeamIndices = $originalTeamPoints->pluck('id')->toArray();

        // Crea un arreglo de índices que corresponda a los equipos filtrados
        $filteredTeamIndices = [];
        foreach ($filteredTeamIds as $filteredTeamId) {
            $index = array_search($filteredTeamId, $originalTeamIndices);
            if ($index !== false) {
                $filteredTeamIndices[] = $index + 1; // Suma 1 para obtener la posición
            }
        }

        // Asigna los números de posición a los equipos filtrados
        foreach ($teamPoints as $key => $teamPoint) {
            $teamPoint->position = $filteredTeamIndices[$key];
        }

        //dd($teamPoints);
        return $teamPoints;
    }
    public function render()
    {
        $teamPoints = $this->chargingData();
        return view('livewire.frontend.table-points',compact('teamPoints'));
    }
}
