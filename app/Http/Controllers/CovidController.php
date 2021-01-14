<?php

namespace App\Http\Controllers;

use App\Models\Covid;
use Illuminate\Http\Request;

class CovidController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'active' => 'required',
            'well' => 'required'
        ]);

        Covid::create($request->all());
    }
}
