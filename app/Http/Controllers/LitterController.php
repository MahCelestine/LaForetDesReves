<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLitterRequest;
use App\Models\Litter;
use App\Models\Dog;
use App\Models\Breed;

class LitterController extends Controller
{
    public function store(StoreLitterRequest $request)
    {
        $validated = $request->validated();

        if ($validated['birth_date'] > now()->format('Y-m-d')) {
            $validated['status'] = 'futur';
        }

        Litter::create($validated);

        return redirect()->route('back.back-chiot');
    }

    public function create()
    {
        $dogs = Dog::all();
        $breeds = Breed::all();
        return view('back.back-litter-create', compact('dogs', 'breeds'));
    }

    public function edit(Litter $litter)
    {
        $dogs = Dog::all();
        $breeds = Breed::all();
        return view('back.back-litter-edit', compact('litter', 'dogs', 'breeds'));
    }

    public function update(StoreLitterRequest $request, Litter $litter)
    {
        $validated = $request->validated();
        if (isset($validated['birth_date']) && $validated['birth_date'] > now()->format('Y-m-d')) {
            $validated['status'] = 'future';
        } elseif ($litter->status === 'future') {
            $validated['status'] = 'en cours';
        }
        $litter->update($validated);
        $litter->puppies()->update([
            'birth_date' => $litter->birth_date,
            'dad_id' => $litter->dad_id,
            'mom_id' => $litter->mom_id,
            'breed_id' => $litter->breed_id,
        ]);
        return redirect()->route('back.back-chiot');
    }

    public function destroy(Litter $litter)
    {
        $litter->puppies()->delete();
        $litter->delete();
        return redirect()->route('back.back-chiot');
    }

    public function indexBack()
    {
        return view('back.back-chiot');
    }

}
