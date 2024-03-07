<?php

namespace App\Http\Livewire\Frontend;

use App\Models\File;
use App\Models\Tournament;
use App\Models\League;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Resolutions extends Component
{
    use WithPagination;

    public $league;
    public $date;
    public $documentoId;
    public $tournament;
     //Query
    public $query = '';
    public $cant = 10;
    protected $queryString = [
        'cant' => ['except' => 10],
        'query' => ['except' => '']
    ];
    public function updatingQuery()
    {
        $this->resetPage();
    }
    public function resetFilter(){
        $this->reset(['query','date']);
    }
    public function mount($leagueSlug, $tournamentSlug){
            $this->documentoId = $leagueSlug;
            $this->tournament = Tournament::where('slug', $tournamentSlug)->firstOrFail();
            $this->league = League::where('slug', $leagueSlug)->firstOrFail();
    }
    public function descargarDocumento()
    {
        $documento = File::find($this->documentoId);

        if (!$documento) {
            return abort(404);
        }

        return Storage::download(public_path('uploads/leagues/files/' . $documento->file_name), $documento->name);

    }
    public function charginData(){
        $query = File::query();
        if ($this->query){
            $query->where('name', 'like', '%' . $this->query .'%');
            $this->resetPage();
        }
        if ($this->date) {
            $fecha = \Carbon\Carbon::parse($this->date)->toDateString();
            $query->whereDate('created_at', $fecha);
            $this->resetPage();
        }
        //return $query->paginate($this->cant);
        return $query->where('tournament_id', $this->tournament->id)->paginate($this->cant);
    }
    public function render()
    {
        $documentos = $this->charginData();
        return view('livewire.frontend.resolutions',compact('documentos'));
    }
}
