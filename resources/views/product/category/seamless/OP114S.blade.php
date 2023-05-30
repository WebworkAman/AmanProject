@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-114S-600-2.png">
            <h2>摺邊封膠包邊多功能機 OP-114S</h2>
            <h3>用於曲線加工</h3>
        </div>
        <div class="right-content">
              
            @include('layouts.question-message')

             <form method="post" action="{{ route('OP-114S')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="35">
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 