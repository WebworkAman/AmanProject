
<html>
    <head>
        <title>Oshima CRM Admin</title>
        @include('layouts.meta')
        @include('layouts.admin.css')
        
   </head>
   <body>
   
   @include('layouts.admin.nav')
       <div id="app"></div>
       <div class="container">
          @yield('content')
       </div>
    

    @section('inline_js')
    
    @show

    @include('layouts.js')
</body>
</html> 