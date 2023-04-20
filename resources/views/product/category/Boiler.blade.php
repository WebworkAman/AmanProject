@extends('layouts.content')

@section('content')
<main>
        <h1>鍋 爐</h1>
        

        <div class="chooseItem">
            <ul>
                <li><a href="{{asset('Boiler/ElectricSteam')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1609382712.png"></a>
                    <p>電蒸氣鍋爐</p>
                </li>
                <li><a href="{{asset('Boiler/GasFired')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1609382743.png"></a>
                    <p>燃氣鍋爐</p>
                </li>
                <li><a href="{{asset('Boiler/OilFired')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1609382778.png"></a>
                    <p>燃油鍋爐</p>
                </li>
                <li><a href="{{asset('Boiler/Biomass')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1609382762.png"></a>
                    <p>生物質鍋爐</p>
                </li>
                <li><a href="{{asset('Boiler/CoalFired')}}"><img
                            src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/1609382792.png"></a>
                    <p>燃煤鍋爐</p>
                </li>
            </ul>
        </div>
    </main>
@endsection 