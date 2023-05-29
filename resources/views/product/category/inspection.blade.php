@extends('layouts.content')

@section('content')
<main>
        <h1>請選擇機器</h1>
        @if(session('fail'))
      <div class="alert alert-danger">
        {{ session('fail') }}
       </div>
       @endif


        <div class="chooseItem">
            <ul>
                <li><a href="{{asset('/FAQ/inspection/OC40N02')}}"><img src="./imgs/photo/1646990118.png"></a>
                    <p>人工智慧AI驗布機 OC-40-N-02</p>
                </li>
                <li><a href="{{asset('/FAQ/inspection/OC1')}}"><img src="./imgs/photo/OC-1-600-4.png"></a>
                    <p>無對邊驗布機 OC-1</p>
                </li>
                <li><a href="{{asset('/FAQ/inspection/OC-5B')}}"><img src="./imgs/photo/OC-5KB-600-2.png"></a>
                    <p>自動對邊驗布機 OC-5B/5K/5KB</p>
                </li>
                <li><a href="{{asset('/FAQ/inspection/OC-83')}}"><img src="./imgs/photo/OC-83-600-6.png"></a>
                    <p>自動對邊驗布機 OC-83</p>
                </li>
            </ul>
        </div>
    </main>
@endsection 