@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OB-90-600-3.png">
            <h2>圓刀裁剪機 OB-90</h2>
            <h3>手的延伸，超值</h3>
        </div> -->
        <div class="right-content">
              
              @include('layouts.question-message')
              <form method="post" action="{{ route('OB-90')}}" enctype="multipart/form-data">
              <input type="hidden" name="product_id" value="20">
                    
              @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 