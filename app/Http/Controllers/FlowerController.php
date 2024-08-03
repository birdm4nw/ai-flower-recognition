<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FlowerController extends Controller
{
    public function index()
    {
        $flowers = DB::table('flowers_info')->get();

        return view('flowers.index', ['flowers' => $flowers]);
    }
}
