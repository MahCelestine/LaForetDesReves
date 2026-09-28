<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dog;
use App\Models\Breed;
use Livewire\Attributes\On;
use Carbon\Carbon;

class ReproducteurTable extends Component
{
    public $selectedType = null;

    public string $slug = '';

    #[On('filter-changed')]
    public function updateFilter($value) {
    
        $this->selectedType = $value;
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $breed = Breed::where('slug', $this->slug)->first();

        $query = Dog::where('breed_id', $breed->id)
        ->where('is_external', false);

        switch ($this->selectedType) {
            case 'male':
                $query->where('sex', 'male')->where('retirement', false);
                break;
            case 'female':
                $query->where('sex', 'female')->where('retirement', false);
                break;
            case 'future':
                $query->where('birth_date', '>', Carbon::now()->subYears(2))
                    ->where('retirement', false);
                break;
            case 'retired':
                $query->where('retirement', true);
                break;
        }
        
        $dogs = $query->withCount(['littersAsDad', 'littersAsMom'])
            ->get();

        return view('livewire.reproducteur-table', compact('dogs', 'breed'));
    }
}
