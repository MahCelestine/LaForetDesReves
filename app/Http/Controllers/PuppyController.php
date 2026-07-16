<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuppyController extends Controller
{
    public function store()
    {
        return view('back.back-chiot');
    }

    public function create()
    {
        return view('back.back-chiot-create');
    }

    public function edit()
    {
        return view('back.back-chiot-update');
    }

    public function update()
    {
        return redirect()->route('back.back-chiot');
    }

    public function destroy()
    {
        return redirect()->route('back.back-chiot');
    }

    public function show() {
        return view('front.chiot');
    }

    public function indexBack()
    {
        return view('back.back-chiot');
    }

    public function index()
    {
        return view('front.nos-chiots');
    }
}
