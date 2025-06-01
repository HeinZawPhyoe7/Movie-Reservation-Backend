<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function movie_store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images' => 'required|string',
            'genre' => 'required|string|max:255',
        ]);

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $base64String = $request->images;

        if (preg_match('/^data:image\/(\w+);base64,/', $base64String, $type)) {
            // Clean the base64 string (remove the "data:image/xxx;base64," prefix)
            $cleanedBase64 = substr($base64String, strpos($base64String, ',') + 1);
            $imageType = strtolower($type[1]); // jpg, png, etc.

            // Decode it just to validate
            $decodedImage = base64_decode($cleanedBase64);

            if ($decodedImage === false) {
                return response()->json(['message' => 'Base64 decode failed'], 400);
            }

            // Optional: save to file
            $fileName = uniqid() . '.' . $imageType;
            Storage::disk('public')->put("images/{$fileName}", $decodedImage);

            // Store the original cleaned base64 string in the DB
            $movie->images = $cleanedBase64; // Store the base64 (without the data:image/... prefix)
        }

        $movie->genre = $request->genre;
        $movie->save();

        return response()->json([
            'movie' => $movie,
            'message' => 'success',
        ], 201);
    }


    public function getall()
    {
        $movie = Movie::all();

        return response()->json([
            'movie' => $movie,
            'message' => 'success'
        ], 201);
    }

    public function show(string $id)
    {
        $movie = Movie::find($id);

        return response()->json([
            'showmovie' => $movie,
            'message' => 'success'
        ]);
    }
}
