<html>
    <head>
        <title>Oshima CRM</title>
        @include('layouts.meta')
        @include('layouts.css')
   </head>
   <body>
   @include('layouts.nav')
       <div class="container">
          @yield('content')
       </div>
    @include('layouts.footer')
    @include('layouts.js')

    @section('inline_js')
    
    @show
</body>
</html> 