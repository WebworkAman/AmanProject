@extends('layouts.content')

@section('content')
<main>
        <h1>請選擇機器</h1>

        <div class="chooseItem">
            <ul>
                <li><a href="{{asset('/FAQ/cutting/OneCut')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/ONECUT-1400S.png?v=1"></a>
                    <p>低層自動裁剪機 OneCut</p>
                </li>
                <li><a href="{{asset('/FAQ/cutting/M6S')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/M8S-600-2.png"></a>
                    <p>智能自動裁剪機 M6S/M8S</p>
                </li>
                <li><a href="{{asset('/FAQ/cutting/TAC')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/TAC-175-600-2.png"></a>
                    <p>自動裁剪機 TAC</p>
                </li>
                <li><a href="{{asset('/FAQ/cutting/OC-510')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-510-1400-6.png"></a>
                    <p>手動裁剪機 OC-510/510L</p>
                </li>
                <li><a href="{{asset('/FAQ/cutting/OB-90')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OB-90-600-3.png"></a>
                    <p>圓刀裁剪機 OB-90/90C/110</p>
                </li>
                <li><a href="{{asset('/FAQ/cutting/A-100U')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1597635338.png"></a>
                    <p>電剪裁剪機 A-100U(DS)/100H</p>
                </li>
                <li><a href="{{asset('/FAQ/cutting/LU-933')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/LU-933-600.png"></a>
                    <p>自動切滾條機 LU-933</p>
                </li>
                <li><a href="{{asset('/FAQ/cutting/OB-700A')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OB-700A-600-2.png"></a>
                    <p>帶狀裁剪機 OB-700A/900A/1200A</p>
                </li>

            </ul>
        </div>
    </main>  
@endsection 