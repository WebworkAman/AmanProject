{{-- <script>
    function reloadAdminIndex(page = 1) {

        var data = localStorage.getItem('data');

        $.ajax({
            url: '/admin/index?page=' + page,
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
    function loadSubPage(url) {
        //使用 JQuery 的 AJAX 方法加載網頁內容
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            // data:{ subpage: subpage }, //將載入的子繼承模板的資訊
            beforeSend: function() {
                // 顯示請求發送中的提示訊息
                $('#sending').show();
            },
            success: function(data) {
                $('#success').show();
                $('#show').html(data); //將載入的網頁內容顯示在子頁面區


            },
            error: function() {
                alert('載入失敗，請重試！');
                // $('#failure').show();

            }
        })
    }



    $(document).ready(function() {
        //在此處添加 jQuery

        var url = localStorage.getItem('url');


        loadSubPage(url);


        $('.control-option').on('click', function() {
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
</script> --}}
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

{{-- 後台管理者刪除功能跳出確認視窗功能 --}}
<script>
    // 選取所有的刪除按鈕
    var deleteButtons = document.querySelectorAll('.delete-button');

    // 對每個刪除按鈕添加點擊事件處理程序
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            // 彈出確認視窗，讓使用者確定是否刪除
            var shouldDelete = confirm('確定要刪除這個項目嗎？');

            // 如果使用者點擊確認，則提交表單；否則取消
            if (!shouldDelete) {
                event.preventDefault();
            }
        });
    });
</script>
