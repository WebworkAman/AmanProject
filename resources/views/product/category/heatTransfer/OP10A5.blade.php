@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-10A5-600-3.png">
            <h2>自動轉印機 OP-10A5</h2>
            <h3>自動抓送標 厚膠首選</h3>
        </div>
        <div class="right-content">
              
        @include('layouts.question-message')

        <form method="post" action="{{ route('OP-10A5')}}" enctype="multipart/form-data">
           <input type="hidden" name="product_id" value="27">
            @include('layouts.question-post')
         </form>
         </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 