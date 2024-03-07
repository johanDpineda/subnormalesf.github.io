<?php

namespace App\Http\Livewire\Frontend;

use App\Models\GameTeam;
use App\Models\League;
use App\Models\Player;
use App\Models\Scorer;
use App\Models\ScorerMatch;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Scorers extends Component
{
    use WithPagination;
    //Mount
    public $league;
    public $tournament;
    public $players;
    public $teams;
    //Query
    public $query = '';
     public $page = 1;
    public $cant = 10;
    public $customVariable = 0;
    public $listItems = [];
    public $player_id='';
    public $team_id;
    protected $queryString = [
        'cant' => ['except' => 10],
        'query' => ['except' => '']
    ];
    protected $listeners = [
        'ScorersShowChange',
    ];
    public function hydrate(){
        $this->emit('ScorersShowHydrate');
    }
    public function ScorersShowChange($value, $key){
        $this->$key = $value;
    }
    public $filtroNombre = ''; // Propiedad para almacenar el nombre del filtro
    public $numeroPosicionFiltrado = null; // Propiedad para almacenar la posición del jugador filtrado

    public function mount($leagueSlug, $tournamentSlug)
    {
        $this->league = League::where('slug', $leagueSlug)->firstOrFail();
        $this->tournament = Tournament::where('slug', $tournamentSlug)->firstOrFail();

        $this->players = Player::where(function ($query) {
            $query->whereHas('scorer',function ($scorerQuery) {
                $scorerQuery->where('tournament_id',$this->tournament->id);
            });
        })->get();

        $this->teams = GameTeam::where(function ($query) {
            $query->whereHas('scorer',function ($scorerQuery) {
                $scorerQuery->where('tournament_id',$this->tournament->id);
            });
        })->get();

    }
    public function updatingQuery()
    {
        $this->resetPage();
    }
    public function resetFilter(){
        $this->reset(['player_id','team_id']);
    }

    public function chargingData(){
        $query = ScorerMatch::query();

        if ($this->player_id) {
            $query->where('player_id', $this->player_id);
            $this->resetPage();
        }

        if ($this->team_id) {
            $query->where('game_team_id', $this->team_id);
            $this->resetPage();
        }

        $query->with(['player.team', 'league', 'tournament', 'game_team'])->where('tournament_id', $this->tournament->id);

        $scorers = $query
            ->select('player_id', 'league_id', 'tournament_id', 'game_team_id', DB::raw('SUM(goals) as total_goals'))
            ->groupBy('player_id', 'league_id', 'tournament_id', 'game_team_id')
            ->when($this->query, function ($scoreQuery) {
                $scoreQuery->whereHas('player', function ($scoreQuery) {
                    $scoreQuery->where(function ($scoreQuery) {
                        $scoreQuery->where('first_name', 'like', '%' . $this->query . '%')
                            ->orWhere('last_name', 'like', '%' . $this->query . '%');
                    });
                });
            })
            ->where('goals', '!=', null)
            ->orderByDesc('total_goals')
            ->paginate($this->cant);


        // Calcular la posición de los registros en la página actual
        $position = $scorers->firstItem();
        foreach ($scorers as $scorer) {
            $scorer->position = $position;
            $position++;
        }

        return $scorers;
    }


    public function render()
    {
        $scorers = $this->chargingData();

        return view('livewire.frontend.scorers',compact('scorers'));
    }


}
