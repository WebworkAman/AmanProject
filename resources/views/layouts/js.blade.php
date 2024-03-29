<script src="{{ asset('js/app.js') }}"></script>


{{-- <script>
    //獲取所有的回覆按鈕
    var replyButtons = document.querySelectorAll('.reply-button');

    replyButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var popup = button.parentNode.nextElementSibling;

            //檢查 nextElementSibling 是否存在

            if (popup) {
                //獲取問題的唯一id
                var questionId = button.getAttribute('data-question-id');
                //檢驗有無抓取id
                console.log(questionId);

                //執行顯示訊息視窗
                // showMessagePopup(questionId);
                popup.style.display = 'block';
            }

        });
    });
    // 关闭弹窗
    var popclose = document.querySelectorAll('.popclose');
    popclose.forEach(function(closeButton) {
        closeButton.addEventListener('click', function() {
            var popup = closeButton.parentNode;


            popup.style.display = 'none';
        });
    });
    //顯示訊息視窗的函式
    function showMessagePopup(questionId) {
        var popup = document.querySelector('.popup');
        var popupContent = popup.querySelector('.popup-content');
        var popclose = document.querySelector('.popclose');


        popup.style.display = 'block';

        popclose.addEventListener('click', function() {

            popup.style.display = 'none';
        })
    };
</script> --}}
<script>
    // 獲取所有的回覆按鈕
    var replyButtons = document.querySelectorAll('.reply-button');

    replyButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // 使用 closest 查找最近的包含 popup 的父元素
            var popup = button.closest('tr').querySelector('.popup');

            // 顯示彈窗
            popup.style.display = 'block';
        });
    });

    // 關閉弹窗
    var popclose = document.querySelectorAll('.popclose');
    popclose.forEach(function(closeButton) {
        closeButton.addEventListener('click', function() {
            var popup = closeButton.closest('.popup');
            popup.style.display = 'none';
        });
    });
</script>
<script>
    //點擊檢視上傳圖片按鈕
    $('.showPostBtn').click(function() {

        //顯示彈窗
        $('.questionPostpop').show();

    });

    //點擊關閉按鈕關閉彈窗
    $('.closePostBtn').click(function() {
        $('.questionPostpop').hide();
        $('form')[0].reset(); // 重置表單
    })
</script>
<script>
    // 在點擊其他區域時隱藏 alert-success 訊息視窗
    document.addEventListener('click', function(event) {
        var targetElement = event.target;
        var alertElement = document.querySelector('.alert-success');

        if (alertElement && !alertElement.contains(targetElement)) {
            alertElement.style.display = 'none';
        }
    });
</script>
<script>
    $(document).ready(function() {
        // 使用事件委派處理點擊事件
        $(document).on('click', '.faq-toggle', function() {

            // 找到相應的 faq-item 元素
            var faqItem = $(this).closest('.faq-item');
            // 找到相應的 faq-content
            var faqContent = faqItem.find('.faq-content');

            // 切換 faq-content 的顯示狀態
            if (faqContent.is(':hidden')) {
                faqContent.fadeIn('slow');
                $(this).text('-');
            } else {
                faqContent.slideUp('slow', function() {
                    faqContent.hide(); // 隱藏 faqContent 元素
                })
                // faqContent.hide();
                $(this).text('+');
            }
        });
    });
</script>

<script>
    //點擊檢視上傳圖片按鈕
    $('.showPhotoBtn').click(function() {
        //獲取圖片 URL
        var photoUrl = $(this).data('photo-url');

        //在彈窗中顯示圖片
        // $('.photoPopup img').attr('src', photoUrl);
        $('.photoPopup img').attr('src', '/public' + photoUrl.trim('/'));

        //顯示彈窗
        $('.photoPopup').show();

    });

    //點擊關閉按鈕關閉彈窗
    $('.popclose').click(function() {
        $('.photoPopup').hide();
    })
</script>
<script>
    // 點擊檢視上傳影片按鈕
    $('.showVideoBtn').click(function() {
        // 獲取影片 URL
        var videoUrl = $(this).data('video-url');

        // 在彈窗中顯示影片
        var videoPopup = $(this).next('.videoPopup');
        // videoPopup.find('video source').attr('src', videoUrl);
        videoPopup.find('video source').attr('src', '/public' + videoUrl.trim('/'));
        videoPopup.find('video')[0].load();

        // 顯示彈窗
        videoPopup.show();
    });

    // 點擊關閉按鈕關閉彈窗
    $('.popclose').click(function() {
        $(this).closest('.videoPopup').hide();
    });
</script>
