@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-114-600.png">
            <h2>無縫摺邊/包邊機 OP-114</h2>
            <h3>包邊首選</h3>
        </div>
        <div class="right-content">
              
             @include('layouts.question-message')

             <form method="post" action="{{ route('OP-114')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="34">
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 