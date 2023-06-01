@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-450GS-600-4.png">
            <h2>小型開邊式粘合機 OP-450GS/520GS/450NS</h2>
            <h3>輕巧桌上型</h3>
        </div> -->
        <div class="right-content">
              
           @include('layouts.question-message')
           
           <form method="post" action="{{ route('OP-450GS')}}" enctype="multipart/form-data">
                  <input type="hidden" name="product_id" value="30">
                  @include('layouts.question-post')
            </form>
            </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 