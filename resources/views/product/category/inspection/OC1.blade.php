@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-1-600-4.png">
            <h2>無對邊驗布機 OC-1</h2>
            <h3>經濟款</h3>
        </div>
        <div class="right-content">
              
             @include('layouts.question-message')

             <form method="post" action="{{ route('post')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="2">
                    @include('layouts.question-post')
             </form>
             
        </div>
        
       
        </div>
        

             
        
    </main>

@endsection 