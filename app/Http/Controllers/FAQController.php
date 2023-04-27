<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class FAQController extends Controller
{
    public function OC40N02(){
        return view('product.FAQ.inspection.OC40N02');
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


    public function TAC(){
        return view('product.FAQ.cutting.TAC');

    }
}