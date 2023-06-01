@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/F8-600-2.png">
            <h2>平織拉布機 F8</h2>
            <h3>再黏的膠一定分開</h3>
        </div> -->
        <div class="right-content">
              
             @include('layouts.question-message')

              <form method="post" action="{{ route('F8')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="14">
                    
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 