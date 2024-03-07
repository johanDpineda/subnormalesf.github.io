<?php

namespace App\Http\Livewire\Frontend;

use App\Models\GameTeam;
use App\Models\Group;
use App\Models\League;
use App\Models\Match;
use App\Models\Session;
use App\Models\Status;
use App\Models\Tournament;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Programming extends Component
{
    use WithPagination;
    //Mount
    public $league;
    public $tournament;
    public $teams;
    public $groups;
    public $statuses;
    public $sessions;
    //Filter
    public $team_id;
    public $group_id;
    public $status_id;
    public $session_id;
    public $date;
    //Query
    public $query = '';
    public $cant = 10;
    protected $queryString = [
        'cant' => ['except' => 10],
        'query' => ['except' => '']
    ];
    protected $listeners = [
        'ProgrammingShowChange',
    ];
    public function hydrate(){
        $this->emit('ProgrammingShowHydrate');
    }
    public function ProgrammingShowChange($value, $key){
        $this->$key = $value;
    }
    public function mount($leagueSlug, $tournamentSlug)
    {
        $this->league = League::where('slug', $leagueSlug)->firstOrFail();
        $this->tournament = Tournament::where('slug', $tournamentSlug)->firstOrFail();
        $this->teams = GameTeam::where(function ($query) {
            $query->whereHas('matchesAsGameTeamOne')->orWhereHas('matchesAsGameTeamTwo');
        })->get();
        //$this->groups = Group::whereHas('matches')->get();
        $this->groups = Group::whereHas('matches')->where('tournament_id', $this->tournament->id)->get();
        //$this->groups = Group::where('tournament_id', $this->tournament->id)->get();
        $this->statuses = Status::all();
        $this->sessions = Session::where('tournament_id', $this->tournament->id)->get();
    }

    public function updatingQuery()
    {
        $this->resetPage();
    }
    public function resetFilter(){
        $this->reset(['team_id','date','group_id','status_id','session_id']);
    }
    public function chargingData(){
        $query = Match::query();

        if ($this->team_id) {
            $query->where(function ($subQuery) {
                $subQuery->where('game_team_one_id', $this->team_id)
                    ->orWhere('game_team_two_id', $this->team_id);
            });
            //$this->resetPage();
        }
        if ($this->date) {
            $query->where('date', $this->date);
            //$this->resetPage();
        }
        if ($this->group_id) {
            $query->where('group_id', $this->group_id);
            //$this->resetPage();
        }
        if ($this->status_id){
            $query->where('status_id', $this->status_id);
            //$this->resetPage();
        }
        if ($this->session_id) {
            $query->where('session_id', $this->session_id);
            //$this->resetPage();
        }
        return $query->where('tournament_id', $this->tournament->id)->orderBy('created_at','DESC')->paginate($this->cant);
    }
    public function render()
    {
        $matches = $this->chargingData();
        return view('livewire.frontend.programming', compact('matches'));
    }
}
