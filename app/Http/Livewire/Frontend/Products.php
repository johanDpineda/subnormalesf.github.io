<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Store;
use App\Models\Productos;

use App\Models\League;

use App\Models\Tournament;

use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    //Mount
    public $store;
    public $producto;
    //Query
    public $query = '';
    public $cant = 9;
    public $playersCountTeams;
    protected $queryString = [
        'cant' => ['except' => 9],
        'query' => ['except' => '']
    ];
    public function mount($storeSlug)
    {
        $this->store = Store::where('slug', $storeSlug)->firstOrFail();
       
        

    }
    public function updatingQuery()
    {
        $this->resetPage();
    }
    public function chargingData(){
        $query = Productos::query();
        if ($this->query) {
            $query->where('name', 'like', '%' . $this->query . '%');
            $this->resetPage();
        }
        $products = $query->whereHas('stores', function ($query) {
            $query->where('store_user_id', $this->store->id);
        })->where('is_active', 1)->paginate($this->cant);

        

        return $products;
    }
    public function render()
    {
        $products = $this->chargingData();

        return view('livewire.frontend.products',compact('products'));
    }
}
