<?php

namespace App\Http\Controllers;

use App\Models\Wallpaper;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WallpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $wallpapers = Wallpaper::get();
//        return response()->json($wallpapers);
        $client = new S3Client([
            'version' => 'latest',
            'region' => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $result = $client->getObject([
            'Bucket' => env('AWS_BUCKET'),
            'Key' => 'космос.webp',
        ]);

        var_dump($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $wallpaper = Wallpaper::create([
            'source' => $request->input('source'),
        ]);

        return response()->json($wallpaper, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallpaper $wallpaper)
    {
        return response()->json($wallpaper);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallpaper $wallpaper)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wallpaper $wallpaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallpaper $wallpaper)
    {
        $wallpaper = Wallpaper::find($wallpaper->id);

        if (!$wallpaper) {
            return response()->json(['error' => 'Wallpaper not found'], 404);
        }

        $wallpaper->delete();
        return response()->json(null, 204);
    }
}
