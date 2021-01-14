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

    public function getCovidFirstData(){
        return [
            "active" => 0,
            "well" => 1000,
            "dead" => 0,
            "total" => 1000
        ];
    }

    public function upload(Request $request){
        $file = $request->file('image');

        $file->move(storage_path('images').DIRECTORY_SEPARATOR, $file->getClientOriginalName());
    }
}
