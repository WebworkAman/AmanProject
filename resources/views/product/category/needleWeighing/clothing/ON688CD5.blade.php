@extends('layouts.content')

@section('content')
     


     <main>

        @include('components.question-title')
        <div class="QA_content">
        <!-- <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/ON-688CD6-600-2.png">
            <h2>連續式金屬檢針機 ON-688CD6/ON-688CDD6</h2>
            <h3>可觸屏操作</h3>
        </div> -->
        <div class="right-content">
              
             @include('layouts.question-message')

              <form method="post" action="{{ route('ON688CD5')}}" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="45">
                    @include('layouts.question-post')
              </form>
             
        </div>

       
        </div>
        

             
        
    </main>
@endsection 