@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/M8S-600-2.png">
            <h2>智能自動裁剪機 M6S/M8S</h2>
            <h3>重型布料裁剪專家</h3>
        </div>
        <div class="right-content">
              
             @include('layouts.question-message')
              <form method="post" action="{{ route('M6S')}}" enctype="multipart/form-data">
              <input type="hidden" name="product_id" value="17">
                    
              @include('layouts.question-post')
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 