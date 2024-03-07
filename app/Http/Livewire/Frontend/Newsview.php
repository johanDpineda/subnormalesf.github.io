<?php

namespace App\Http\Livewire\Frontend;

use App\Models\News;
use App\Models\Tournament;
use App\Models\League;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Newsview extends Component
{
    use WithPagination;

    public $store;
   


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

    public function resetFilter()
    {
        $this->reset(['query', 'date']);
    }

    public function mount($storeSlug)
    {
      
        $this->store = Store::where('slug', $storeSlug)->firstOrFail();
    }


    private function buildQuery()
    {
        $query = News::query();

        if ($this->query) {
            $query->where('title', 'like', '%' . $this->query . '%');
        }

        return $query->where('store_user_id', $this->store->id)->orderBy('created_at', 'DESC')->where('is_active','1');
    }

    public function charginData()
    {

        return $this->buildQuery()->paginate($this->cant);
    }


    public function newfive()
    {

        return $this->buildQuery()->limit(5)->get();
    }





    public function render()
    {
        $newsviews = $this->charginData();
        $newsviewsfive = $this->newfive();

        return view('livewire.frontend.newsview', compact('newsviews','newsviewsfive'));
    }
}
