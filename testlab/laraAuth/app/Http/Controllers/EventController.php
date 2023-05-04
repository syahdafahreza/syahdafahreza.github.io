<?php

namespace App\Http\Controllers;
use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $event = Event::latest()->get();
        echo"hallo";
        // return view('event.index', compact('events'));
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:155',
            'date' => 'required',
            'jum_peserta' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'date' => $request->date,
            'jum_peserta' => $request->jum_peserta,
            
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
}
