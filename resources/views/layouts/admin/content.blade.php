
<html>
    <head>
        <title>Oshima CRM Admin</title>
        @include('layouts.meta')
        @include('layouts.admin.css')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>
   <body>
   
   @include('layouts.admin.nav')
       <div id="app"></div>
       <div class="container">
          
          @yield('content')
       </div>
    


        @show
    
    <!-- @show -->
    @include('layouts.js')
    @push('scripts')
    <script>
        function truncatedText(elementId,maxLength){
            var element = document.getElementById(elementId);
            var text = element.innerHTML;
            if(text.length > maxLength){
                element.innerHTML = text.substring(0, maxLength) + "<span style='color: red;'>...</span>";
            }
        }

        truncatedText("truncated-text",10);
    </script>
    @endpush

</body>
</html> 