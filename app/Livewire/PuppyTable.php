<?php

namespace App\Livewire;

use App\Models\Litter;
use Livewire\Component;
use Livewire\Attributes\On;

class PuppyTable extends Component
{
    public $selectedStatus = null;

    #[On('filter-changed')]
    public function updateFilter($value) {
    
        $this->selectedStatus = $value;
    }

    public function render()
    {
        $litters = Litter::with(['breed', 'dad', 'mom', 'puppies'])
            ->when($this->selectedStatus, function ($query) {
                $query->where('status', $this->selectedStatus);
            })
            ->get();

        return view('livewire.puppy-table', compact('litters'));
    }
}
