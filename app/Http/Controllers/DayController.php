<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        $days = Day::all();
        return view('back.day.index', compact('days'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required'
        ]);

        $day = new Day();
        $day->day = $request->day;
        $day->slug = Str::slug($request->day);
        $day->save();

        return redirect()->route('dr.day.index')->with('success', 'Day added successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'day' => 'required'
        ]);

        $day = Day::where('id', $request->id)->firstOrFail();
        $day->day = $request->day;
        $day->slug = Str::slug($request->day);
        $day->save();

        return redirect()->route('dr.day.index')->with('success', 'Day updated successfully');
    }

    public function delete(Request $request)
    {
        $day = Day::where('id', $request->id)->firstOrFail();
        $day->delete();
        return redirect()->route('dr.day.index')->with('success', 'Day removed successfully');
    }
}
