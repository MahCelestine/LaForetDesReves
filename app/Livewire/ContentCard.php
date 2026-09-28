<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Content;
use App\Models\Category;
use Livewire\Attributes\On;

class ContentCard extends Component
{
    public $selectedType = null;

    #[On('filter-changed')]
    public function updateFilter($value)
    {

        $this->selectedType = $value;
    }

    public function render()
    {
        $categories = Category::all();
        $contents = Content::with('category')
            ->where('is_published', true)
            ->when($this->selectedType, function ($query) {
                $query->where('category_id', $this->selectedType);
            })
            ->orderBy('publication_date', 'desc')
            ->get();

        return view('livewire.content-card', compact('contents', 'categories'));
    }
}
