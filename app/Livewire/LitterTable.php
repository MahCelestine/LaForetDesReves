<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Litter;
use App\Models\Breed;
use Livewire\Attributes\On;
use Carbon\Carbon;

class LitterTable extends Component
{
    public $selectedType = null;

    public string $slug = '';

    #[On('filter-changed')]
    public function updateFilter($value)
    {

        $this->selectedType = $value;
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $breed = Breed::where('slug', $this->slug)->firstOrFail();

        $query = Litter::where('breed_id', $breed->id)
            ->with(['puppies', 'dad', 'mom']);

        switch ($this->selectedType) {
            case 'en cours':
                $query->where('status', 'en cours');
                break;
            case 'futur':
                $query->where('status', 'futur');
                break;
            case 'passée':
                $query->where('status', 'passée');
                break;
            default:
                break;
        }

        $litters = $query->latest('birth_date')->get();

        return view('livewire.litter-table', compact('litters', 'breed'));
    }
}

