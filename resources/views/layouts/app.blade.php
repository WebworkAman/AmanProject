<html>
    <head>
        <title>Oshima CRM</title>
        @include('layouts.meta')
        @include('layouts.css')
        <link rel="stylesheet" href="css/app.css">
   </head>
   <body>
   @include('layouts.nav')
       <div class="container">
          @yield('content')
       </div>
    @include('layouts.footer')
    @include('layouts.js')
</body>
</html> 