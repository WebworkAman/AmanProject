<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function show($id, Request $request){

        // $id = $request -> input('id');
        var_dump($id);
        $index = $id - 1;   
        
        $products = [
            [
                "imageUrl" => asset('imgs/1596784113.png')
            ],
            [
                "imageUrl" => asset('imgs/1596784246.png')               
            ]

        ];
        
        $product = $products[$id];

        return view('product.show',[
            "product" => $product 
        ]);
    } 
}
