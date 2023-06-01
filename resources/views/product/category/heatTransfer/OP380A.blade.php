@extends('layouts.content')

@section('content')
     
     <main>

        @include('components.question-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-380A-600-2.png">
            <h2>自動轉印機 OP-380A/380AII/380AIIT/550A</h2>
            <h3>印花首選</h3>
        </div> -->
        <div class="right-content">
              
         @include('layouts.question-message')

         <form method="post" action="{{ route('OP-380A')}}" enctype="multipart/form-data">
           <input type="hidden" name="product_id" value="28">
            @include('layouts.question-post')
         </form>
         </div>
        </div>
             
        </div>

       
        </div>
        
        
    </main>
@endsection 