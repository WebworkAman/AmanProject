<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){

          $products = $this->getProducts();

          return view('/',[
            "products" => $products
          ]

          );
            
    }
    function show($id, Request $request){

        

        // $id = $request -> input('id');
        // var_dump($id);
          
        
        $products = $this -> getProducts();
        

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

    private function getProducts(){
        return[
            
                [
                    "imageUrl" => asset('imgs/1596784113.png')
                ],
                [
                    "imageUrl" => asset('imgs/1596784246.png')               
                ]
    
            
                ];
    }
}
