@extends('layouts.content')
@section('content')

<main>
    <div id="main" data-title="Title Home"></div>
        <div class="img-block">
            <ul>
                <li><a href="/inspection"><img src="../imgs/1596784113.png"></img></a>
                    <ol>
                        <li><p>驗 布</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                    
                </li>
                <li><a href="/relaxing"><img src="../imgs/1597907651.png"></a>
                    
                    <ol>
                        <li><p>鬆 布</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li><a href="/spreading"><img src="../imgs/1596784246.png"></a>
                    <ol>
                        <li><p>拉 布</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/cutting"><img src="../imgs/1596784261.png"></a>

                    
                    <ol>
                        <li><p>裁 剪</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/ironing"><img src="../imgs/1597889061.png"></a>

                    
                    <ol>
                        <li><p>整 燙 定 型</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/heatTransfer">
                        <img src="../imgs/1596784303.png">
                    </a>
                    
                    <ol>
                        <li><p>轉 印</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/fusingPress">
                        <img src="../imgs/1598492647.png">
                    </a>
                    
                    <ol>
                        <li><p>黏 合</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/seamless">
                        <img src="../imgs/1598492619.png">
                    </a>

                    
                    <ol>
                        <li><p>無 縫 黏 合</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/folding">
                        <img src="../imgs/1597908117.png">
                    </a>
                    
                    <ol>
                        <li><p>摺 衣</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/packaging">
                        <img src="../imgs/1596784354.png">
                    </a>

                    
                    <ol>
                        <li><p>包 裝</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/needle">
                        <img src="../imgs/1621919665.png">
                    </a>

                    
                    <ol>
                        <li><p>金 屬、重 量 檢 測</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/needle">
                    <img src="../imgs/1608539845.png">
                    </a>
                    
                    
                    <ol>
                        <li><p>鍋 爐</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/Needle">
                    <img src="../imgs/1596784420.png">
                    </a>
                    
                    
                    <ol>
                        <li><p>其 它 機 械</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
                <li>
                    <a href="/Needle">
                    <img src="../imgs/主題-5.png">
                    </a>
                    
                    
                    <ol>
                        <li><p>主 題 系 列</p></li>
                        <li><a href='https://.pngtree.com/so/圓形問號符號'><img src="../imgs/—Pngtree—round question mark symbol_4438523.png"></a></li>
                    </ol>
                </li>
            </ul>
        </div>
    </main>    
@endsection     

@section('inline_js')
   @parent
   <script>
        var containerTag = document.getElementById('main')
        var title = containerTag.getAttribute('data-title')
        // renderPage1()
        render.home(
            document.getElementById('main'),
            title
        // ,"Title Home" 參數引入寫法
        )
   </script>
@endsection