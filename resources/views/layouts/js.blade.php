<script src="{{asset('js/app.js')}}"></script>

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
                

                var currentUrl = $(this).attr('href'); //取得按鈕網址
                var baseUrl = window.location.origin;
                // 提取相对路径
                var url = currentUrl.replace(baseUrl, '');
                console.log(url); 
                
                // var url = $(this).data('url'); // 获取按钮的 data-url 属性值
                 
                localStorage.setItem('url', url);
                $('#loading').show();

                loadSubPage(url); //加載子頁面內容
                
            });

           
        });
    </script>

<script>
        //獲取所有的回覆按鈕
        var replyButtons = document.querySelectorAll('.reply-button');

        replyButtons.forEach(function(button){
            button.addEventListener('click',function(){
                var popup = button.parentNode.nextElementSibling;

                //獲取問題的唯一id
                var questionId = button.getAttribute('data-question-id');
                //檢驗有無抓取id
                console.log(questionId);
                            
                //執行顯示訊息視窗
                // showMessagePopup(questionId);
                popup.style.display = 'block';
            });
        });
                // 关闭弹窗
               var popclose = document.querySelectorAll('.popclose');
                popclose.forEach(function(closeButton){
                closeButton.addEventListener('click', function(){
               var popup = closeButton.parentNode;
            

                popup.style.display = 'none';
        });
     });
        //顯示訊息視窗的函式
        function showMessagePopup(questionId){
            var popup = document.querySelector('.popup');
            var popupContent = popup.querySelector('.popup-content');
            var popclose = document.querySelector('.popclose');
            

            popup.style.display = 'block';

            popclose.addEventListener('click',function(){

                

                popup.style.display = 'none';
            })
        };
    </script>