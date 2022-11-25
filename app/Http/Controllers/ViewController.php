<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ViewController extends Controller
{
    public function __invoke(){
        return view('OC40N02') 
        -> with('messages',Message::all());
    }
}
