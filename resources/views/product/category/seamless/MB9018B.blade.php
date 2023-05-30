@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/MB9018B-600.png">
            <h2>超聲波花邊機(雙電機) MB9018B</h2>
            <h3>2020必備</h3>
        </div>
        <div class="right-content">
              
             @include('layouts.question-message')

             <form method="post" action="{{ route('MB9018B')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="33">
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 