<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Category;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;

class ContentController extends Controller
{
    public function store(StoreContentRequest $request)
    {
        $validated = $request->validated();

        if ($request->filled('new_category')) {
            $normalizedName = trim($request->input('new_category'));

            $category = Category::whereRaw('LOWER(name) = ?', [mb_strtolower($normalizedName)])
                ->first();

            if (!$category) {
                $category = Category::create([
                    'name' => ucfirst($normalizedName)
                ]);
            }

            $validated['category_id'] = $category->id;
        }
        unset($validated['new_category']);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('contents', 'public');
        }

        if ($request->filled('tiktok_path')) {
            $validated['is_video'] = 1;
            $validated['content'] = '-';
        }

        Content::create($validated);
        return redirect()->route('back.back-content');
    }

    public function create()
    {
        $categories = Category::all();
        return view('back.back-content-create', compact('categories'));
    }

    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('back.back-content-edit', compact('content', 'categories'));
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        $validated = $request->validated();
        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('contents', 'public');
        }

        if ($content['is_video'] == 1) {
            $validated['content'] = '-';
        }

        $content->update($validated);
        return redirect()->route('back.back-content');
    }

    public function destroy(Content $content)
    {
        if ($content->image_path && \Storage::disk('public')->exists($content->image_path)) {
            \Storage::disk('public')->delete($content->image_path);
        }
        $content->delete();
        return redirect()->route('back.back-content');
    }

    public function show()
    {
        return view('front.content');
    }

    public function indexBack(Request $request)
    {
        $categories = Category::all();
        $contents = Content::with('category')
            ->orderBy('publication_date', 'desc')
            ->get();

        return view('back.back-content', compact('categories', 'contents'));
    }

    public function index()
    {
        return view('front.le-coin-conseil');
    }
}
