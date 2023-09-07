@extends('layouts.content')

@section('content')
    <main>
        <h1>請選擇機器</h1>
        @if (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif


        <div class="chooseItem">
            <ul>
                @if (!empty($products))
                    @foreach ($products as $product)
                        <li>
                            <a href="{{ $product->relatedLink }}"><img src="{{ $product->img_url }}"></img></a>

                            <ol>
                                <li>
                                    <p>{{ $product->title }}</p>
                                </li>
                            </ol>
                        </li>
                    @endforeach
                @else
                    <p>No products available.</p>
                @endif
            </ul>
        </div>
    </main>
@endsection
