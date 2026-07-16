<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DogController extends Controller
{
    public function store()
    {
        return view('back.back-chien');
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
