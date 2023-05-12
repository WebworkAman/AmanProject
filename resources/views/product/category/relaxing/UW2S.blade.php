@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/UW-2S-600.png">
            <h2>蒸氣鬆布機 UW-2S/2LS/2MS</h2>
            <h3>想快，選它</h3>
        </div>
        <div class="right-content">
              
             @include('layouts.question-message')

             <form method="post" action="{{ route('UW-2S')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="6">
                    @include('layouts.question-post')
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 