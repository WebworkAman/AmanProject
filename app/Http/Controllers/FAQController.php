<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class FAQController extends Controller
{
    public function create(){
        return view('product.FAQ.cutting');

    }
}