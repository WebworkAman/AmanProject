<html>
    <head>
        <title>Oshima CRM</title>
        @include('layouts.meta')
        @include('layouts.css')
        <link rel="stylesheet" href="css/app.css">
   </head>
   <body>
   @include('layouts.nav')

   @if($member)
   <p>Hi,{{$member->email}}</p>
   <form method="POST" action="{{route('members.session.delete')}}">
        @csrf
        @method('DELETE')
        <button type="submit">Log out</button>
   </form>
   @else
   <div class=""><a href="{{route('members.session.create')}}">Log in</a></div>
   <div class=""><a href="{{route('members.create')}}">Register</a></div>
   @endif

   <!-- <form action="{{route('members.session.delete')}}" method="post">
        
        <button type="submit">Log out</button>
   </form> -->
   <hr />



       <div class="container">
          @yield('content')
       </div>
    @include('layouts.footer')
    @include('layouts.js')
</body>
</html> 