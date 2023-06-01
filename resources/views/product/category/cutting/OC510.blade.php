@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-510-1400-6.png">
            <h2>手動裁剪機 OC-510/510L</h2>
            <h3>手的延伸，超值</h3>
        </div> -->
        <div class="right-content">
              
             @include('layouts.question-message')
              <form method="post" action="{{ route('OC-510')}}" enctype="multipart/form-data">
              <input type="hidden" name="product_id" value="19">
                    
              @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 