@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/F8-600-2.png">
            <h2>全能拉布機 K5</h2>
            <h3>經典款-愛不釋手</h3>
        </div> -->
        <div class="right-content">
              
             @include('layouts.question-message')

              <form method="post" action="{{ route('F8')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="44">
                    
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 