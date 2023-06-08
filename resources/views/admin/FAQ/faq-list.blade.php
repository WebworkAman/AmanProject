<div class="Show_form">
                    <h3>常見問題區管理</h3>
                    <a class="btn" href="{{route('faqs.create')}}">新增常見問題</a>

                      <table>
                              <thead>
                                  <tr>
                                      <th>產品型號</th>
                                      <th>問題詳情</th>
                                      <th>問題回復</th>
                                      <th>照片</th>
                                      <th>影片</th>
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
                                                @if($faq->photo)
                                                   <button class="showPhotoBtn" data-photo-url="{{Storage::url($faq->photo)}}">
                                                         檢視照片
                                                   </button>  
                                                   <div class="photoPopup" style="display: none">
                                                        <img src="{{ asset('storage/photos/' . basename($faq->photo)) }}" alt="Question Photo">
                                                        <button class="popclose">關閉</button>
                                                   </div> 
                                                @else
                                                    <p>無</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($faq->video)
                                                   <button class="showVideoBtn" data-video-url="{{Storage::url($faq->video)}}">
                                                         檢視影片
                                                   </button>  
                                                   <div class="videoPopup" style="display: none">
                                                        <video controls>
                                                            <source src="{{ asset('storage/videos/' . basename($faq->video)) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <button class="popclose">關閉</button>
                                                   </div> 
                                                @else
                                                    <p>無</p>
                                                @endif
                                            </td>
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

                       <script>
                        //點擊檢視上傳圖片按鈕
                        $('.showPhotoBtn').click(function(){
                                //獲取圖片 URL
                                var photoUrl = $(this).data('photo-url');

                                //在彈窗中顯示圖片
                                // $('.photoPopup img').attr('src',photoUrl);
                                $('.photoPopup img').attr('src','/public'+photoUrl.trim('/'));

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
                         var videoPopup = $(this).next('.videoPopup');
                        //  videoPopup.find('video source').attr('src', videoUrl);
                         videoPopup.find('video source').attr('src','/public'+ videoUrl.trim('/'));
                         videoPopup.find('video')[0].load();

                         // 顯示彈窗
                         videoPopup.show();
                     });

                        // 點擊關閉按鈕關閉彈窗
                        $('.popclose').click(function () {
                            $(this).closest('.videoPopup').hide();
                        });
                    </script>

                   
</div>