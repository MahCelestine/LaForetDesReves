<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function store()
    {
        return view('back.back-content');
    }

    public function create()
    {
        return view('back.back-content-create');
    }

    public function edit()
    {
        return view('back.back-content-update');
    }

    public function update()
    {
        return redirect()->route('back.back-content');
    }

    public function destroy()
    {
        return redirect()->route('back.back-content');
    }

    public function show() {
        return view('front.content');
    }

    public function indexBack()
    {
        return view('back.back-content');
    }

    public function index()
    {
        return view('front.le-coin-conseil');
    }
}
