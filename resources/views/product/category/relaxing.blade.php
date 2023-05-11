@extends('layouts.content')

@section('content')
<main>
        <h1>請選擇機器</h1>

        <div class="chooseItem">
            <ul>
                <li><a href="{{asset('FAQ/relaxing/UW-2')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/UW-2-600-3.png"></a>
                    <p>無蒸氣鬆布機 UW-2/2L/2M</p>
                </li>
                <li><a href="{{asset('FAQ/relaxing/UW-2S')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/UW-2S-600.png"></a>
                    <p>蒸氣鬆布機 UW-2S/2LS/2MS</p>
                </li>
                <li><a href="{{asset('FAQ/relaxing/OC-100')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OC-100-600-2.png"></a>
                    <p>蒸氣預縮 OC-100/100L</p>
                </li>
                <li><a href="{{asset('FAQ/relaxing/OSP-2000II')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSP-2000II-600-3.png"></a>
                    <p>蒸氣預縮 OSP-2000II/2000III</p>
                </li>
                <li><a href="{{asset('FAQ/relaxing/OSP-2008')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OSP-2008-600-3.png"></a>
                    <p>蒸氣預縮 OSP-2008/2008L/2008W/2008WL</p>
                </li>

            </ul>
        </div>
    </main>
@endsection 