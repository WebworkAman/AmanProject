@extends('layouts.content')

@section('content')
     <div class="faq-search-show">
<h1>搜 尋 結 果</h1>

    @if ($faqs->isEmpty())
        <p>沒有此關鍵字搜尋問題，請重新輸入！</p>
    @else
            
        <table>
                              <thead>
                                  <tr>
                                      <th>產品型號</th>
                                      <th>常見問題</th>
                                      <th>我們的回復</th>
                                      
                                  </tr>
                              </thead>
                               <tbody>
                                    @foreach ($faqs as $faq)
                                        <tr>
                                            <td>{{ $products->find($faq->product_id)->title }}</td>
                                            <td>{{ $faq->question }}</td>
                                            <td>{{ $faq->answer }}</td>
                                            
                                        </tr>
                                    @endforeach
                               </tbody>
                       </table>

    </div>
@endif

@endsection 