<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Breed;
use App\Models\Dog;
use App\Models\Puppy;
use App\Models\Litter;
use Illuminate\Support\Str;


class BreedController extends Controller
{
    /**
     * Affiche la page spécifique d'une race avec ses reproducteurs et chiots
     * 
     * @param string $slug (ex: 'samoyede', 'berger-americain', 'staffie')
     */

    public function show(string $slug)
    {
        $breed = Breed::where('slug', $slug)->first();

        $viewName = 'front.' . $breed->slug;

        $randomDogs = Dog::where('breed_id', $breed->id)
            ->where('is_external', false)
            ->inRandomOrder()
            ->take(3)
            ->get();

        $randomPuppies = Puppy::whereHas('litter', function ($query) use ($breed) {
            $query->where('breed_id', $breed->id);
        })
            ->inRandomOrder()
            ->take(3)
            ->get();


        if (view()->exists($viewName)) {
            return view($viewName, compact('breed', 'randomDogs', 'randomPuppies'));
        } else {
            abort(404);
        }
    }

    public function showBreedDogs(string $slug)
    {
        $breed = Breed::where('slug', $slug)->firstOrFail();

        return view('front.nos-reproducteurs', compact('breed', 'slug'));
    }

    public function showBreedPuppies(string $slug)
    {
        return view('front.nos-chiots', compact('slug'));
    }

    public function showDogDetails(string $slug, string $dogSlug)
    {
        $breed = Breed::where('slug', $slug)->firstOrFail();
        $dog = Dog::where('slug', $dogSlug)
            ->where('breed_id', $breed->id)
            ->with(['pictures'])
            ->firstOrFail();
        $litters = $dog->litters()
            ->with(['puppies'])
            ->latest('birth_date')
            ->get();

        $allPuppies = $litters->flatMap->puppies;

        $availablePuppies = $allPuppies
            ->where('status', 'disponible')
            ->shuffle()
            ->take(3);

        $otherPuppies = $allPuppies
            ->where('status', '!=', 'disponible')
            ->shuffle()
            ->take(3);

        return view('front.dog-details', compact('breed', 'dog', 'litters', 'availablePuppies', 'otherPuppies'));
    }

    public function showPuppyDetails(string $slug, string $puppySlug)
    {
        $breed = Breed::where('slug', $slug)->firstOrFail();
        $puppy = Puppy::where('slug', $puppySlug)
            ->whereHas('litter', function ($query) use ($breed) {
                $query->where('breed_id', $breed->id);
            })
            ->with(['pictures', 'litter.puppies', 'litter.dad', 'litter.mom'])
            ->firstOrFail();

        $litterPuppies = $puppy->litter->puppies->reject(function ($sibling) use ($puppy) {
            return $sibling->id === $puppy->id;
        });

        return view('front.puppy-details', compact('breed', 'puppy', 'breed', 'litterPuppies'));
    }
}