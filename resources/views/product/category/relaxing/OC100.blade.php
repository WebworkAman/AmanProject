@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-100-600-2.png">
            <h2>蒸氣預縮 OC-100/100L</h2>
            <h3>初代</h3>
        </div>
        <div class="right-content">
              
              @include('layouts.question-message')

             <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="7">
                    @include('layouts.question-post')
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 