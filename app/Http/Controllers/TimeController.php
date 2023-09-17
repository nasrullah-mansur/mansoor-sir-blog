<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::all();
        return view('back.time.index', compact('times'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required'
        ]);

        $time = new Time();
        $time->time = $request->time;
        $time->slug = Str::slug($request->time);
        $time->save();

        return redirect()->route('dr.time.index')->with('success', 'Time added successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'time' => 'required'
        ]);

        $time = Time::where('id', $request->id)->firstOrFail();
        $time->time = $request->time;
        $time->slug = Str::slug($request->time);
        $time->save();

        return redirect()->route('dr.time.index')->with('success', 'Time updated successfully');
    }

    public function delete(Request $request)
    {
        $time = Time::where('id', $request->id)->firstOrFail();
        $time->delete();
        return redirect()->route('dr.time.index')->with('success', 'Time removed successfully');
    }
}
