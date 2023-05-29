@extends('layouts.content')
@section('content')
@include('layouts.search')
<main>
    <!-- <div id="main" data-title="Title Home"></div> -->

        <div class="img-block">

            <ul>
                 @foreach($pages as $page)
                 <li>
                     <a href="{{$page['link']}}"><img src="{{$page['imageUrl']}}"></img></a>
                 
                 <ol>
                 <li><p>{{$page['sort']}}</p></li>
                 <!-- <li><a href="{{$page['FAQ-link']}}" onclick="{{$page['message']}}"><img src="{{asset('imgs/—Pngtree—round question mark symbol_4438523.png')}}"></a></li> -->
                 </ol>
                 </li>
                 @endforeach           
            </ul>
        </div>
    </main>    
@endsection     

@section('inline_js')
   @parent
   <!-- <script>

        var containerTag = document.getElementById('main')
        var title = containerTag.getAttribute('data-title')
        // renderPage1()
        render.home(
            document.getElementById('main'),
            title
        // ,"Title Home" 參數引入寫法
        )
   </script> -->
   
@endsection