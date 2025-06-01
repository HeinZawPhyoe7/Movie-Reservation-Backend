<?php

namespace App\Http\Controllers;

use App\Models\MovieDetail;
use Illuminate\Http\Request;

class MovieDetailController extends Controller
{
    public function movie_detail_store(Request $request)
    {
        $request->validate([
            'cinema_name' => 'required|string|max:255',
            'cinema_place' => 'required|string|max:255',
            'period_time' => 'required|string',
            'show_day' => 'required|string|max:255',
            'time_list' => 'required|array',
            'movie_id' => 'required|exists:movies,id',
        ]);

        $detail = new MovieDetail();
        $detail->cinema_name = $request->cinema_name;
        $detail->cinema_place = $request->cinema_place;
        $detail->period_time = $request->period_time;
        $detail->show_day = $request->show_day;
        $detail->time_list = $request->time_list;
        $detail->movie_id = $request->movie_id;
        $detail->save();

        return response()->json([
            'details' => $detail,
            'message' => 'success'
        ]);
    }

    public function movie_detail_getall()
    {
        $detail = MovieDetail::all();

        return response()->json([
            'movie_details' => $detail,
            'message' => 'success'
        ], 201);
    }
}
