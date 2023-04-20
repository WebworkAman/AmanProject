@extends('layouts.content')

@section('content')
<main>
        <h1>請選擇機器</h1>

        <div class="chooseItem">
            <ul>
                <li><a href="{{asset('/needleWeighing/clothing/ON-688CD6')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/ON-688CD6-600-2.png"></a>
                    <p>連續式金屬檢針機 ON-688CD6/ON-688CDD6</p>
                </li>
                <li><a href="{{asset('/needleWeighing/clothing/OMW-600')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OMW-600-600.png"></a>
                    <p>連續式金屬檢針機&重量檢測設備 OMW-600/800/1000</p>
                </li>
                <li><a href="{{asset('/needleWeighing/clothing/ON-30')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/ON-30-600-2.png"></a>
                    <p>手提式檢針機 ON-30</p>
                </li>
                <li><a href="{{asset('/needleWeighing/clothing/ON-688P')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/ON-688P-600-2.png"></a>
                    <p>連續式金屬檢針翻轉裝置 ON-688P</p>
                </li>

            </ul>
        </div>
    </main>
@endsection 