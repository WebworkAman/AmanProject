@extends('layouts.content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ-驗布</title>
    <link rel="stylesheet" href="../css/FAQ.css">
</head>
<body>
@section('content')
<main>
    <div class="title">
        <h1>常 見 問 題 _＿驗 布</h1>
        <h2></h2>
    </div>
    
    <div class="center">
    <div class="img_block">
              <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1596784113.png">
    </div>
        

        <div class="question_block">
             
            <div class="list-top">
                <ul>
                    <li>故障發生情況
                        <ol>
                           <li><br/>1.自動拉布狀態下機台走走停停有時未回定位切刀會突然動作或不回行.</li>
                           <li>2.送布展布輪無法自動送布</li>
                           <li><br/>3.對邊台左右不動作</li>
                           <li><br/>4.1.升降馬達只能升無法往下.
                                       2.	升降動作後會一直滑下到底部
                           </li>
                           <li><br/>5.刀片馬達不轉動</li>
                        </ol>
                    </li>
                    <li>故障情況原因
                    <ol>
                
                    <li>
                        1.切刀滑車刀行A傳感器與感應鐵片距離過大及搖晃.<br/>
                        2.直流供應器提供的直流電源不足導致繼電器電壓不足而不動作.
                    </li>
                    <li>
                        送布滾輪 由前輪鏈條 經單向軸承 變速皮帶輪 離合器等帶動，時間久了單向軸承偶會有傳動不良現象
                     </li>
                     <li>
                     1.	對邊起動光電故障.
                    2.	FR/FL/ER/EL/SCR1/SCR2-故障
                    3.	行程開關故障L/LL/RR/R
                    4.	F3-保險絲跳脫
                     </li>
                     <li>
                        1. TACPRO參數資料和X,Y軸同步齒輪或馬達有異常。<br/>
                        2. 馬達軸鍵條脫落。
                     </li>
                     <li><br/>1.	F1保險絲跳脫.
2.	直流電壓20是否來電.
3.	CR繼電器是否正常.
4.	PLC-(+Y2)是否輸出.
5.	馬達本身碳刷問題
</li>

                    
                    </ol>
                    <li>解決對策
                        <ol>
                    <li>1.調整切刀滑車白色塑鋼座是否鬆脫或是感應片問題.
                         或是傳感器本體問題<br/>
                        2.更換直流供應器<br/>
                    </li>
                    <li>
                    1.	則需拆下浸泡於去漬油中做清潔。另一可能性 
                    2.	無布時它不轉 拉黑色布料(吸光)時有誤判可能，此現象較常遇到。

                    </li>
                    <li>
                    
                    1.檢查對邊馬達電源電線是否有DC20V.若有DC20V到達-請更換馬達.
                    2.若無DC20V到達檢查線路迴路

                    </li>
                    <li>
                    1.	下限近接傳感器故障.
                    2.	升降馬達煞車離合器故障
                    </li>
                    <li>
                    1.	刀片卡布-電流過載.
2.	檢查變壓器.
3.	外觀有發黑更換繼電器.
4.	檢查磨刀PLC(+Y2)是否亮燈.
5.	更換馬達

                    </li>
                </ol>
                    </li>
                    <li>備註</li>
                    
                </ul>
                

            </div>
        </div>
    </div>
    
    </main>
    
  
@endsection
</body>
</html> 



        