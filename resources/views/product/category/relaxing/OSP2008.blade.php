@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSP-2008-600-3.png">
            <h2>蒸氣預縮 OSP-2008/2008L/2008W/2008WL</h2>
            <h3>中小型工廠 最愛</h3>
        </div>
        <div class="right-content">
              
             @include('layouts.question-message')

              <form method="post" action="{{ route('OSP-2008')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="9">
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 