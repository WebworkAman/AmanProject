<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class FAQController extends Controller
{
    public function create0(){
        return view('product.FAQ.relaxing');
    }
    public function create(){
        return view('product.FAQ.inspection');

    }
    public function create1(){
        return view('product.FAQ.cutting');
    }
    
    public function create3(){
        return view('product.FAQ.spreading');
    }
    public function create5(){
        return view('product.FAQ.spreading');
    }
}