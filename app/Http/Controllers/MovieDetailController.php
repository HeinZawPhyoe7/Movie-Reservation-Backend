<?php

namespace App\Http\Controllers;

use App\Models\MovieDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieDetailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre' => 'required|string|max:255',
            'cinema_name' => 'required|string|max:255',
            'cinema_place' => 'required|string|max:255',
            'period_of_time' => 'required|string|max:255',
            'show_day' => 'required|string|max:255',

        ]);

        $detail = new MovieDetail();
        $detail->title = $request->title;
        $detail->description = $request->description;
        if ($request->hasFile('images')) {
            $newimage = $request->file('images')->store('images', 'public');
            $imagedata = Storage::disk('public')->get($newimage);
            $base64 = base64_encode($imagedata);
        }
        $detail->images = json_encode($base64);
        $detail->genre = $request->genre;
        $detail->cinema_name = $request->cinema_name;
        $detail->cinema_place = $request->cinema_place;
        $detail->period_of_time = $request->period_of_time;
        $detail->show_day = $request->show_day;
        $detail->first_time = $request->first_time;
        $detail->second_time = $request->second_time;
        $detail->third_time = $request->third_time;
        $detail->fourth_time = $request->fourth_time;
        $detail->save();

        return response()->json([
            'detail' => $detail,
            'message' => 'success'
        ], 201);
    }


    public function getall()
    {
        $detail = MovieDetail::all();

        return response()->json([
            'detail' => $detail,
            'message' => 'success'
        ], 201);
    }

    public function show(string $id)
    {
        $detail = MovieDetail::find($id);

        return response()->json([
            'alldetail' => $detail,
            'message' => 'success'
        ]);
    }
}
