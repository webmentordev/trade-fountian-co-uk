<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        return view('reviews', [
            'reviews' => Review::latest()->paginate(100)
        ]);
    }

    public function create(){
        return view('post-review');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'location' => 'nullable|max:255',
            'date' => 'required|max:255',
            'color' => 'required|max:255',
            'review' => 'required',
            'star' => 'required|numeric|min:4|max:5',
            'url' => 'required|url',
        ]);

        Review::create([
            'name' => $request->name,
            'title' => $request->title,
            'location' => $request->location,
            'date' => $request->date,
            'color' => $request->color,
            'review' => $request->review,
            'star' => $request->star,
            'url' => $request->url
        ]);

        return back()->with('success', 'Review has been posted');
    }
}
