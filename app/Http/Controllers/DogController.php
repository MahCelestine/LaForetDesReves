<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDogRequest;
use App\Models\Dog;

class DogController extends Controller
{
    public function store(StoreDogRequest $request)
    {
        $validated = $request->validated();

        $validated['image_path'] = 'placeholder.jpg';

        $dog = Dog::create($validated);

        return redirect()->route('back.back-chien');
    }

    public function create()
    {
        return view('back.back-chien-create');
    }

    public function edit()
    {
        return view('back.back-chien-update');
    }

    public function update()
    {
        return redirect()->route('back.back-chien');
    }

    public function destroy()
    {
        return redirect()->route('back.back-chien');
    }

    public function show() {
        return view('front.chien');
    }

    public function indexBack()
    {
        return view('back.back-chien');
    }

    public function index()
    {
        return view('front.nos-reproducteurs');
    }
}
