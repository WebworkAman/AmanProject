<div class="Show_form question-list">
                    <h3>客戶問題區管理</h3>
                    

                      <table>
                              <thead>
                                  <tr>
                                      <th>客戶姓名</th>
                                      <th>標題</th>
                                      <th>內容</th>
                                      <th></th>
                                  </tr>
                              </thead>
                               <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $question->member->name }}</td>
                                            <td>{{ $question->title }}</td>
                                            <td>{{ $question->content }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('questions.destroy', $question) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">刪除</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                               </tbody>
                       </table>                  
</div>