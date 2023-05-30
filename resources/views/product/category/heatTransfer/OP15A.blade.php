@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-15A-4600.png">
            <h2>商標轉印機 OP-15A/15AII</h2>
            <h3>商標 單雙工位任選</h3>
        </div>
        <div class="right-content">
              
         @include('layouts.question-message')

        <form method="post" action="{{ route('OP-15A')}}" enctype="multipart/form-data">
           <input type="hidden" name="product_id" value="29">
            @include('layouts.question-post')
         </form>
         </div>
        </div>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 