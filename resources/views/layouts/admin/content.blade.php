
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
    

    @section('inline_js')
    
    @show

    <script>
        function reloadAdminIndex() {

            var data = localStorage.getItem('data');
                    $.ajax({
                        url: '/admin/index',
                        type: 'GET',
                        dataType: 'html',
                        success: function(data) {
                            $('#show').html(data);

                            
                            
                                $('#loading').show();
                                loadSubPage(url);
                            

                        },
                        // error: function() {
                        //     alert('載入失敗，請重試！');
                        // }
                    });
                }
        //加載子頁面內容
        function loadSubPage(url){
            //使用 JQuery 的 AJAX 方法加載網頁內容
            $.ajax({
                url: url,
                type:'GET',
                dataType:'html',
                // data:{ subpage: subpage }, //將載入的子繼承模板的資訊
                beforeSend: function() {
                 // 顯示請求發送中的提示訊息
                    $('#sending').show();
                },
                success:function(data){
                    $('#success').show();
                    $('#show').html(data);//將載入的網頁內容顯示在子頁面區
                    
                    
                },
                error:function(){
                    alert('載入失敗，請重試！');
                    // $('#failure').show();

                }
            })
        }
        $(document).ready(function(){
            //在此處添加 jQuery

            var url = localStorage.getItem('url');
            loadSubPage(url);
        

            $('.control-option').on('click',function(){
                event.preventDefault(); // 阻止預設行為
                

                var url = $(this).attr('href'); //取得按鈕網址
                 
                localStorage.setItem('url', url);
                $('#loading').show();

                loadSubPage(url); //加載子頁面內容
                
            });

           
        });
    </script>
</body>
</html> 