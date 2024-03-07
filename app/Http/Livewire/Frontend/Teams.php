<?php

namespace App\Http\Livewire\Frontend;

use App\Models\GameTeam;
use App\Models\Group;
use App\Models\League;
use App\Models\Session;
use App\Models\Status;
use App\Models\Tournament;
use Livewire\Component;
use Livewire\WithPagination;

class Teams extends Component
{
    use WithPagination;
    //Mount
    public $league;
    public $tournament;
    //Query
    public $query = '';
    public $cant = 9;
    public $playersCountTeams;
    protected $queryString = [
        'cant' => ['except' => 9],
        'query' => ['except' => '']
    ];
    public function mount($leagueSlug, $tournamentSlug)
    {
        $this->league = League::where('slug', $leagueSlug)->firstOrFail();
        $this->tournament = Tournament::where('slug', $tournamentSlug)->firstOrFail();

    }
    public function updatingQuery()
    {
        $this->resetPage();
    }
    public function chargingData(){
        $query = GameTeam::query();
        if ($this->query) {
            $query->where('name', 'like', '%' . $this->query . '%');
            $this->resetPage();
        }
        $teams = $query->whereHas('tournamentTeams', function ($query) {
            $query->where('tournament_id', $this->tournament->id);
        })->paginate($this->cant);

        // Calcular el conteo de jugadores por equipo en función del torneo
        foreach ($teams as $team) {
            $playersCount = $team->playerTeams()
                ->where('tournament_id', $this->tournament->id)
                ->count();
            $this->playersCountTeams[$team->id] = $playersCount;
        }

        return $teams;
    }
    public function render()
    {
        $teams = $this->chargingData();

        return view('livewire.frontend.teams',compact('teams'));
    }
}
