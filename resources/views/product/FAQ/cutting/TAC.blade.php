@extends('layouts.content')

@section('content')
     


     <main>

        <h1>故 障 及 解 決 對 策</h1>
        <div class="QA_content">
        <div class="left-content">
            <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/TAC-175-600-2.png">
            <h2>自動裁剪機 TAC</h2>
            <h3>超優，超值</h3>
        </div>
        <div class="right-content">
              
            <div class="faq">
                  <button><a href="{{asset('TAC')}}">我 要 提 問</a></button>
                  
                  <div class="listblock">
                  <div class="topline"></div>
                  <ul>
                    <li>
                       <p class="faq-title"><span>Q.</span>機械原點偏移。</p>
                       <p class="faq-content"><span>A.</span>TACPRO 參數資料有異常，設定復原出廠值TACPRO資料夾。</p>
                    </li>
                    <li>
                       <p class="faq-title"><span>Q.</span>冲孔馬達/磨刀石電腦螢幕報警 “err130”， 並且查看電控箱M軸控制器報警提示訊號-</p>
                       <p class="faq-content"><span>A.</span>輸入電壓過高(超過3P 200V+10%)量測變壓器一次側是否超過3P380V, 與主開關處3P220V是否正常在200~220V之間?</p>
                    </li>
                    <li>
                       <p class="faq-title"><span>Q.</span>黃色安全把手走位 造成近接開關 沒感應到位，檢查感應開關是否在位置上並做調整</p>
                       <p class="faq-content"><span>A.</span>機台有任一個行程氣缸 磁感應開關沒感應到在待機標準位置上，以"線路檢查",各氣缸磁感應是否在正確位置?
                    </p>
                    </li>
                    <li>
                       <p class="faq-title"><span>Q.</span>機台報警空氣氣源不足。</p>
                       <p class="faq-content"><span>A.</span>TACPRO 參數資料有異常，設定復原出廠值TACPRO資料夾。</p>
                    </li>
                    <li>
                       <p class="faq-title"><span>Q.</span>機械原點偏移。</p>
                       <p class="faq-content"><span>A.</span>主輸入氣源不足 或氣管有折彎，檢查空壓機。</p>
                    </li>
                  </ul>

                  </div>
                  
            </div>
             
        </div>
             
       
        </div>
        

             
        
    </main>
@endsection 