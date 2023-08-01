<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class FirebaseController extends Controller
{
    private $database;

    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function index()
    {
        return response()->json($this->database->getReference('souce/')->getValue());
    }

    public function create(Request $request)
    {
        $this->database
            ->getReference('source/post/' . $request['title'])
            ->set([
                'title' => $request['title'] ,
                'content' => $request['content']
            ]);

        return response()->json('blog has been created');
    }

}
