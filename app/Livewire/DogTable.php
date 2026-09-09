<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dog;
use Livewire\Attributes\On;

class DogTable extends Component
{
    public $selectedBreed = null;

    #[On('filter-changed')]
    public function updateFilter($value) {
    
        $this->selectedBreed = $value;
    }

    public function render()
    {
        $dogs = Dog::with('breed')
            ->when($this->selectedBreed, function ($query) {
                $query->where('breed_id', $this->selectedBreed);
            })
            ->get();
        return view('livewire.dog-table', compact('dogs'));
    }
}
