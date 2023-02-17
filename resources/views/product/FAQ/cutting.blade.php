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
        <h1>常 見 問 題 _＿自 動 裁 剪 機</h1>
        <h2></h2>
    </div>
    
    <div class="center">
    <div class="img_block">
              <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1596784261.png">
    </div>
        

        <div class="question_block">
             
            <div class="list-top">
                <ul>
                    <li>故障發生情況
                        <ol>
                           <li><br/>1.電腦無法開機(無法啟動微軟系統)</li>
                           <li>2.設定參數復原流程出現未能複製訊息</li>
                           <li><br/>3.無法開啟C.A/S.C應用程式。</li>
                           <li><br/>4.機械原點偏移。</li>
                           <li><br/>5.冲孔馬達無法調速。</li>
                        </ol>
                    </li>
                    <li>故障情況原因
                    <ol>
                
                    <li>
                        1.UPS不斷電單元(電池壽命已到)。<br/>
                        2.PC電腦本身電源供應器模組損壞。
                    </li>
                    <li>
                        1.設定的路徑選錯。<br/>
                        2.所選定的TACPRO資料參數有誤。
                     </li>
                     <li>
                        key試用期已到。
                     </li>
                     <li>
                        1. TACPRO參數資料和X,Y軸同步齒輪或馬達有異常。<br/>
                        2. 馬達軸鍵條脫落。
                     </li>
                     <li><br/>冲孔馬達電位器接線鬆脫。</li>

                    
                    </ol>
                    <li>解決對策
                        <ol>
                    <li>1.更換電池(因航空件不接受電池類寄送只能在當地採購)/<br/>或更換整個UPS單元(注意輸入電壓110V或220)。<br/>
                        2.若客戶有IT人員可就近更換當地的電源供應器模組。<br/>
                        3.更換整部電腦(含軸卡)。
'                   </li>
                    <li>
                        請選擇TACPRO資料夾所在的上一個路徑不要直接點選TACPRO。
                    </li>
                    <li>
                        請與歐西瑪公司連絡。
                    </li>
                    <li>
                       請選擇TACPRO資料夾所在的上一個路徑不要直接點選TACPRO。
                    </li>
                    <li>
                       檢查冲孔馬達電位器接線是否正確連接

                        <br/>冲孔1:CNVINA
                        <br/>冲孔2:CNVINB
                        <br/>冲孔3:CNVINC
                    </li>
                </ol>
                    </li>
                    <li>備註
                        <ol>
                            <li></br></li>
                            <li></br>若上一步方式還未能複製：
                             先移除卸載C.A軟件後再一次安裝(從備用E盤硬碟找中文或英文的TACPRO)並重複上一個步驟。
                            </li>
                            <li></br></li>
                            <li><br/>參照電腦硬碟"E" TACPRO備份。</li>
                        </ol>
                    </li>
                    
                </ul>
                

            </div>
        </div>
    </div>
    
    </main>
    
  
@endsection
</body>
</html> 



        