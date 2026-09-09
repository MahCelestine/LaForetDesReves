<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Content;
use Livewire\Attributes\On;

class ContentTable extends Component
{
    public $selectedType = null;

    #[On('filter-changed')]
    public function updateFilter($value) {
    
        $this->selectedType = $value;
    }

    public function render()
    {
        $contents = Content::with('category')
            ->when(!is_null($this->selectedType), function ($query) {
                $query->where('is_video', $this->selectedType);
            })
            ->orderBy('publication_date', 'desc')
            ->get();

        return view('livewire.content-table', compact('contents'));
    }
}
