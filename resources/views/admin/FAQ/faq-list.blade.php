<div class="Show_form">
                    <h3>常見問題區管理</h3>
                    <a class="btn" href="{{route('faqs.create')}}">新增常見問題</a>

                      <table>
                              <thead>
                                  <tr>
                                      <th>產品型號</th>
                                      <th>問題詳情</th>
                                      <th>問題回復</th>
                                      <th></th>
                                  </tr>
                              </thead>
                               <tbody>
                                    @foreach ($faqs as $faq)
                                        <tr>
                                            @if($faq->product_id)
                                              <td>{{ $products->find($faq->product_id)->title }}</td>
                                            @else
                                            <td>沒查詢到對應產品</td>
                                            @endif
                                            <td>{{ $faq->question }}</td>
                                            <td>{{ $faq->answer }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('faqs.destroy', $faq) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">刪除</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                               </tbody>
                       </table>

                       <input type="hidden" name="form_state" value="filled">

                   
</div>