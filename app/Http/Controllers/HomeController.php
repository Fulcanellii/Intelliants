<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];

        $data['news'] = News::with('companies')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('home', $data);
    }
}
