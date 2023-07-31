<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index()
    {
        $fakeData = [
            'id' => 1,
            'name' => 'fake name',
            'email' => 'fake@email.com'
        ];

        return response()->json($fakeData);
    }
}
