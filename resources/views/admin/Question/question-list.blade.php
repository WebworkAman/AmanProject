<div class="Show_form question-list">
                    <h3>客戶問題區管理</h3>
                    

                      <table>
                              <thead>
                                  <tr>
                                      <th>客戶姓名</th>
                                      <th>產品</th>
                                      <th>標題</th>
                                      <th>內容</th>
                                      <th>照片</th>
                                      <th>影片</th>
                                      <th></th>
                                      <th></th>
                                  </tr>
                              </thead>
                               <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td><p>{{ $question->member->name }}</p></td>
                                            @if($question->product_id)
                                              <td>{{ $products->find($question->product_id)->title }}</td>
                                            @else
                                            <td>沒查詢到對應產品</td>
                                            @endif
                                            <td><p>{{ $question->title }}</p></td>
                                            <td><p id='truncated-text'>{{ $question->content }}</p></td>
                                            <td>
                                                @if($question->photo)
                                                   <button class="showPhotoBtn" data-photo-url="{{Storage::url($question->photo)}}">
                                                         檢視照片
                                                   </button>  
                                                   <div class="photoPopup" style="display: none">
                                                        <img src="/public/{{ Storage::url($question->photo) }}" alt="Question Photo">
                                                        <button class="popclose">關閉</button>
                                                   </div> 
                                                @else
                                                    <p>無</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($question->video)
                                                   <button class="showVideoBtn" data-video-url="{{Storage::url($question->video)}}">
                                                         檢視影片
                                                   </button>  
                                                   <div class="videoPopup" style="display: none">
                                                        <video controls>
                                                            <source src="/public/{{ Storage::url($question->video) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <button class="popclose">關閉</button>
                                                   </div> 
                                                @else
                                                    <p>無</p>
                                                @endif
                                            </td>
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
                     <script>
                        //點擊檢視上傳圖片按鈕
                        $('.showPhotoBtn').click(function(){
                                //獲取圖片 URL
                                var photoUrl = $(this).data('photo-url');

                                // //在彈窗中顯示圖片
                                $('.photoPopup img').attr('src',photoUrl);

                                //顯示彈窗
                                $('.photoPopup').show();

                        });

                        //點擊關閉按鈕關閉彈窗
                        $('.popclose').click(function(){
                            $('.photoPopup').hide();
                        })
                    </script>
                    <script>
    // 點擊檢視上傳影片按鈕
    $('.showVideoBtn').click(function () {
        // 獲取影片 URL
        var videoUrl = $(this).data('video-url');

        // 在彈窗中顯示影片
        var videoPopup = $('.videoPopup');
        videoPopup.find('video source').attr('src', videoUrl);
        videoPopup.find('video')[0].load();

        // 顯示彈窗
        videoPopup.show();
    });

    // 點擊關閉按鈕關閉彈窗
    $('.popclose').click(function () {
        $(this).closest('.videoPopup').hide();
    });
</script>
                    
                       @stack('scripts')               
</div>

