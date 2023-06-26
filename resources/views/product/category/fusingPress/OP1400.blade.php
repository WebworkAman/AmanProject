@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-1600-600-5.png">
            <h2>大型連續式粘合機 OP-1400/1600/1800/L</h2>
            <h3>大型工廠批量生產</h3>
        </div> -->
        <div class="right-content">
              
           @include('layouts.question-message')
           
           <form method="post" action="{{ route('OP-1400')}}" enctype="multipart/form-data">
                  <input type="hidden" name="product_id" value="32">
                  @include('layouts.question-post')
            </form>
            </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 