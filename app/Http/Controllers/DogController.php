<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDogRequest;
use App\Http\Requests\UpdateDogRequest;
use App\Models\Breed;
use App\Models\Dog;
use Illuminate\Support\Facades\Storage;

class DogController extends Controller
{
    public function store(StoreDogRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('dogs', 'public');
        }

        Dog::create($validated);

        return redirect()->route('back.back-chien');
    }

    public function create()
    {
        $breeds = Breed::all();
        return view('back.back-chien-create', compact('breeds'));
    }

    public function edit(Dog $dog)
    {
        $breeds = Breed::all();
        return view('back.back-chien-edit', compact('dog', 'breeds'));
    }

    public function update(UpdateDogRequest $request, Dog $dog)
    {
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            if ($dog->image_path && Storage::disk('public')->exists($dog->image_path)) {
                Storage::disk('public')->delete($dog->image_path);
            }
            $validated['image_path'] = $request->file('image_path')->store('dogs', 'public');
        }

        $dog->update($validated);

        return redirect()->route('back.back-chien');
    }

    public function destroy(Dog $dog)
    {
        if ($dog->image_path && Storage::disk('public')->exists($dog->image_path)) {
            Storage::disk('public')->delete($dog->image_path);
        }
        $dog->delete();

        return redirect()->route('back.back-chien');
    }

    public function show()
    {
        return view('front.chien');
    }

    public function indexBack(Request $request)
    {
        $dogs = Dog::with('breed')->get();
        $breeds = Breed::all();

        return view('back.back-chien', compact('dogs', 'breeds'));
    }

    public function index()
    {
        return view('front.nos-reproducteurs');
    }
}
