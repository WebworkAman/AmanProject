<div class="Show_form question-list">
                    <h3>客戶問題區管理</h3>
                    

                      <table>
                              <thead>
                                  <tr>
                                      <th>客戶姓名</th>
                                      <th>標題</th>
                                      <th>內容</th>
                                      <th></th>
                                      <th></th>
                                  </tr>
                              </thead>
                               <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td><p>{{ $question->member->name }}</p></td>
                                            <td><p>{{ $question->title }}</p></td>
                                            <td><p id='truncated-text'>{{ $question->content }}</p></td>
                                            <td ><a class='question-reply' href="{{route('question.answer',$question->id)}}">回覆</a></td>
                                            <td>
                                                <form method="POST" action="{{ route('questions.destroy', $question->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">刪除</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                               </tbody>
                       </table>   
                       @stack('scripts')               
</div>

