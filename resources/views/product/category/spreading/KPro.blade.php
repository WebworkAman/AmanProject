@extends('layouts.content')

@section('content')
     


     <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/KPro-600.png">
            <h2>智能全能拉布機 KPro</h2>
            <h3>Pro，如其名</h3>
        </div> -->
        <div class="right-content">
              
             @include('layouts.question-message')
            
              <form method="post" action="{{ route('KPro')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="12">
                    
                    @include('layouts.question-post')
              </form>
              </div>
        </div>

       
        </div>
        

             
        
    </main>
@endsection 