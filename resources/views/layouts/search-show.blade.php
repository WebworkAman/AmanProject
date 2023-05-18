@extends('layouts.content')

@section('content')
     <div class="faq-search-show">
<h1>搜 尋 結 果</h1>


@if ($results->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>產品型號</th>
                        <th>常見問題</th>
                        <th>我們的回復</th>
                                      
                    </tr>
                </thead>
                <tbody>
                   @foreach ($results as $faq)
                        <tr>
                            <td>{{ $products->find($faq->product_id)->title }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{{ $faq->answer }}</td>
                                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

@else
    <p>沒有找到符合搜尋條件的常見問題。</p>
@endif

@endsection 