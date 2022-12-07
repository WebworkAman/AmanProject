<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class FAQController extends Controller
{
    public function __invoke(){
        return view('FAQ')
        -> with('messages',Message::all());
    }
}