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
            'genere' => 'required|string|max:255',
        ]);

        $details = new MovieDetail();
        $details->title = $request->title;
        $details->description = $request->description;
        if ($request->hasFile('images')) {
            $newimage = $request->file('images')->store('images', 'public');
            $imagedata = Storage::disk('public')->get($newimage);
            $base64 = base64_encode($imagedata);
        }
        $details->images = json_encode($base64);
        $details->genere = $request->genere;
        $details->save();

        return response()->json([
            'movie_details' => $details,
            'movie_img' => json_encode([$base64]),
            'message' => 'success'
        ], 201);
    }
}
