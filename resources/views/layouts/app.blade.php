<html>
    <head>
        <title>Oshima CRM</title>
        @include('layouts.meta')
        @include('layouts.css')
        <link rel="stylesheet" href="css/app.css">
   </head>
   <body>
   @include('layouts.nav')
   <div class=""><a href="{{route('members.session.create')}}">Log in</a></div>
   <div class=""><a href="{{route('members.create')}}">Register</a></div>
   <form action="{{route('members.session.delete')}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Log out</button>
   </form>
   <hr />



       <div class="container">
          @yield('content')
       </div>
    @include('layouts.footer')
    @include('layouts.js')
</body>
</html> 