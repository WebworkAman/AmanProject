@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.faq-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/T5-600-2.png">
            <h2>針織圓筒布拉布機 T5</h2>
            <h3>貼身衣物的最佳選擇</h3>
        </div>
        <div class="right-content">
              
              @include('layouts.question-message')
              <form method="post" action="{{ route('T5')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="15">
                    
                    @include('layouts.question-post')
              </form>
            </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 