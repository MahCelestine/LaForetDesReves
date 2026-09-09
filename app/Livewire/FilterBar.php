<?php

namespace App\Livewire;

use Livewire\Component;

class FilterBar extends Component
{
    public array $options = [];

    public $selected = null;

    public function selectOption($value = null) {
        $this->selected = $value;
        $this->dispatch('filter-changed', value: $value);
    }
    public function render()
    {
        return view('livewire.filter-bar');
    }
}
