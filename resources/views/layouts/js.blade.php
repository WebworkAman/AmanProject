<script src="{{asset('js/app.js')}}"></script>

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