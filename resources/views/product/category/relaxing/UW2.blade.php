@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/UW-2-600-3.png">
            <h2>無蒸氣鬆布機 UW-2/2L/2M</h2>
            <h3>要慢，就等</h3>
        </div>
        <div class="right-content">
              
            @include('layouts.question-message')
             
              <form method="post" action="{{ route('UW-2')}}" enctype="multipart/form-data">
                   <input type="hidden" name="product_id" value="5">
                    @include('layouts.question-post')
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 