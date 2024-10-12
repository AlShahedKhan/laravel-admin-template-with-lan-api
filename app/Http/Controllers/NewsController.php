<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Show the list of news articles
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    // Show the form for creating a new news article
    public function create()
    {
        return view('news.create');
    }

    // Store a newly created news article in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'description' => 'required',
        ]);

        $news = new News();
        $news->title = $validated['title'];
        $news->author = $validated['author'];
        $news->date = $validated['date'];
        $news->description = $validated['description'];

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        $news->image = 'images/' . $imageName;
        $news->save();

        return redirect()->route('news.index')->with('success', 'News article created successfully!');
    }

    // Show the form for editing a news article
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $news->date = \Carbon\Carbon::createFromFormat('Y-m-d', $news->date);

        return view('news.edit', compact('news'));
    }

    // Update the specified news article in the database
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'date' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        'description' => 'required',
    ]);

    $news = News::findOrFail($id);
    $news->title = $validated['title'];
    $news->author = $validated['author'];
    $news->date = $validated['date'];
    $news->description = $validated['description'];

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        $news->image = 'images/' . $imageName;
    } elseif (!$request->has('image')) {
        $news->image = $news->image;
    }

    $news->save();

    return redirect()->route('news.index')->with('success', 'News article updated successfully!');
}


    // Delete the specified news article from the database
    public function delete($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News article deleted successfully!');
    }
}
