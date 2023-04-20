@extends('layouts.content')

@section('content')
<main>
        <h1>請選擇機器</h1>

        <div class="chooseItem">
            <ul>
                <li><a href="{{asset('OFC-1')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OFC-1-600.png"></a>
                    <p>智能服裝摺疊包裝機 OFC-1/1S/2/2S</p>
                </li>
                <li><a href="{{asset('OFC-450')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OFC-450-600.png"></a>
                    <p>智能服裝摺疊包裝機 OFC-450</p>
                </li>
                <li><a href="{{asset('OSZ-50')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSZ-50-600-2.png"></a>
                    <p>半動摺蓋封箱機 OSZ-50</p>
                </li>
                <li><a href="{{asset('OSZ-K02')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSZ-K02-600-2.png"></a>
                    <p>自動中速開箱機 OSZ-K02</p>
                </li>
                <li><a href="{{asset('OSZ-50X')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSZ-50X-600-2.png"></a>
                    <p>半自動角邊封箱機 OSZ-50X</p>
                </li>
                <li><a href="{{asset('OSZ-50N')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSZ-50N-600-2.png"></a>
                    <p>全自動摺蓋封箱機 OSZ-50N</p>
                </li>
                <li><a href="{{asset('OSZ-50XN')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSZ-50XN-600-2.png"></a>
                    <p>全自動角邊封箱機 OSZ-50XN</p>
                </li>
            </ul>
        </div>
    </main>
@endsection 