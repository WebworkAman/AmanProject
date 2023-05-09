<div class="Show_form">
                    <h3>常見問題區管理</h3>
                    <a href="{{route('faqs.create')}}">新增常見問題</a>

                      <table>
                              <thead>
                                  <tr>
                                      <th>問題詳情</th>
                                      <th>問題回復</th>
                                      <th></th>
                                  </tr>
                              </thead>
                               <tbody>
                                    @foreach ($faqs as $faq)
                                        <tr>
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