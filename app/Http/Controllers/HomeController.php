<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return response([
            "message" => "Mapper Project Is Run",
            "status" => "OK",
        ]);
    }
}
