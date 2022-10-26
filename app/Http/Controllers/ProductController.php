<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function show($id, Request $request){

        // $id = $request -> input('id');
        // var_dump($id);
          
        
        $products = [
            [
                "imageUrl" => asset('imgs/1596784113.png')
            ],
            [
                "imageUrl" => asset('imgs/1596784246.png')               
            ]

        ];

        $index = $id - 1; 
        
        if($index >= 0 && $index < count($products)){
            //show page

            $product = $products[$index];

            return view('product.show',[
              "product" => $product 
        ]);
        }else{
            //404 not found
            
            abort(404);
        }

        
    } 
}
