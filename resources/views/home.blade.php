@extends('layouts.content')
@section('content')
    @include('layouts.search')
    <main>
        <!-- <div id="main" data-title="Title Home"></div> -->

        <div class="img-block">

            {{-- <ul>
                @foreach ($series as $serie)
                    <li>
                        <a href="{{ $serie->relatedLinks }}"><img src="{{ $serie->seriesImage }}"></img></a>

                        <ol>
                            <li>
                                <p>{{ $serie->name }}</p>
                            </li>
                        </ol>
                    </li>
                @endforeach
            </ul> --}}
            <ul>
                @foreach ($series as $serie)
                    <li>
                        <a href="{{ route('Series', $serie->name) }}"><img src="{{ $serie->seriesImage }}"></a>
                        <ol>
                            <li>
                                <p>{{ $serie->name }}</p>
                            </li>
                        </ol>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>
@endsection

@section('inline_js')
    @parent
    <!-- <script>
        var containerTag = document.getElementById('main')
        var title = containerTag.getAttribute('data-title')
        // renderPage1()
        render.home(
            document.getElementById('main'),
            title
            // ,"Title Home" 參數引入寫法
        )
    </script> -->
@endsection
