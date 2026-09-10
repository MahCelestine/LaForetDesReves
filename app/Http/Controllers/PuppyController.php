<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Litter;
use App\Models\Puppy;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePuppyRequest;
use App\Http\Requests\UpdatePuppyRequest;
use Illuminate\Support\Facades\Storage;

class PuppyController extends Controller
{
    public function store(StorePuppyRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('puppies', 'public');
        }

        $litter = Litter::findOrFail($request->input('litter_id'));
        $validated['litter_id'] = $litter->id;
        $validated['mom_id'] = $litter->mom_id;
        $validated['dad_id'] = $litter->dad_id;
        $validated['breed_id'] = $litter->breed_id;
        $validated['birth_date'] = $litter->birth_date;

        $validated['weight'] = $request->input('weight', 0) ?? 0;

        DB::transaction(function () use ($validated, $litter, $request) {
            $puppy = Puppy::create($validated);
            $litter->increment('number_puppies', 1);

            if ($request->hasFile('pictures')) {
                foreach ($request->file('pictures') as $file) {
                    $path = $file->store('puppies', 'public');
                    $puppy->pictures()->create([
                        'image_path' => $path,
                    ]);
                }
            }
        });



        return redirect()->route('back.back-chiot');
    }

    public function create(Request $request)
    {
        $litter_id = $request->query('litter_id') ?? $request->route('litter_id');

        return view('back.back-chiot-create', [
            'litter_id' => $litter_id,
        ]);
    }
    public function edit(Puppy $puppy)
    {
        return view('back.back-chiot-edit', compact('puppy'));
    }

    public function update(UpdatePuppyRequest $request, Puppy $puppy)
    {
        $validated = $request->validated();
        if ($request->hasFile('image_path')) {
            if ($puppy->image_path && Storage::disk('public')->exists($puppy->image_path)) {
                Storage::disk('public')->delete($puppy->image_path);
            }
            $validated['image_path'] = $request->file('image_path')->store('puppies', 'public');
        }
        $puppy->update($validated);

        if ($request->filled('delete_pictures')) {
            $picturesToDelete = $puppy->pictures()->whereIn('id', $request->input('delete_pictures'))->get();

            foreach ($picturesToDelete as $picture) {
                if (Storage::disk('public')->exists($picture->image_path)) {
                    Storage::disk('public')->delete($picture->image_path);
                }
                $picture->delete();
            }
        }

        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $file) {
                $path = $file->store('puppies', 'public');

                $puppy->pictures()->create([
                    'image_path' => $path,
                ]);
            }
        }
        return redirect()->route('back.back-chiot');
    }

    public function destroy(Puppy $puppy)
    {
        if ($puppy->image_path && Storage::disk('public')->exists($puppy->image_path)) {
            Storage::disk('public')->delete($puppy->image_path);
        }
        foreach ($puppy->pictures as $picture) {
            if (Storage::disk('public')->exists($picture->image_path)) {
                Storage::disk('public')->delete($picture->image_path);
            }
        }

        $puppy->pictures()->delete();
        $puppy->delete();
        return redirect()->route('back.back-chiot');
    }

    public function show()
    {
        return view('front.chiot');
    }

    public function indexBack(Request $request)
    {
        $litters = Litter::with('puppies')->get();
        $puppies = Puppy::with('litter', 'breed')->get();

        return view('back.back-chiot', compact('litters', 'puppies'));
    }

    public function index()
    {
        return view('front.nos-chiots');
    }
}
