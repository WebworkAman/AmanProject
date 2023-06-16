@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-900A-600-4.png">
            <h2>連續式粘合機 OP-900A/900LA/1000A/1000LA</h2>
            <h3>經濟款</h3>
        </div> -->
        <div class="right-content">
              

             
           @include('layouts.question-message')

          <form method="post" action="{{ route('OP900A')}}" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="46">
                @include('layouts.question-post')
          </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 