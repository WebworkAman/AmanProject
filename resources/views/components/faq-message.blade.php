
         
<div class="listblock">
             <div class="topline"></div>
             
             @if($faqs->isEmpty())
                  <h2>此機型暫無提供常見問題</h2>
             @else

             @foreach($faqs as $index => $faq)
               
                 <ul>
                    <li class="faq-item"> 
                        <div class="faq-title">
                            <!-- <h3>{{ $index + 1 }}.</h3> -->
                             <label>Q</label>
                              <pre>{{$faq->question}}</pre>
                            <div class="itemBlock">                              
                            @if($faq->photo)
                            <img src="{{asset('imgs/icon/camera.png')}}">
                            @else
                            @endif
                            @if($faq->video)
                            <img src="{{asset('imgs/icon/video-camera.png')}}">
                            @else
                            @endif
                            </div>
                            <button class="faq-toggle">+</button>
                        </div>
                        <div class="faq-content">
                            <p><pre>{{$faq->answer}}</pre></p>
                            <div class="faq-photo">
                              @if($faq->photo)
                                  <button class="showPhotoBtn" data-photo-url="{{Storage::url($faq->photo)}}">
                                          檢視照片
                                  </button>  
                                  <div class="photoPopup" style="display: none">
                                      <img src="{{ asset('storage/photos/' . basename($faq->photo)) }}" alt="Question Photo">
                                      <button class="popclose">關閉</button>
                                  </div> 
                              @else
                              @endif
                           </div>
                           <div class="faq-video">
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
                                 @endif
                           </div>
                        </div>




                    </li>
                 </ul>
                 @endforeach
             @endif
             
</div>
<script>
                        //點擊檢視上傳圖片按鈕
                        $('.showPhotoBtn').click(function(){
                                //獲取圖片 URL
                                var photoUrl = $(this).data('photo-url');

                                //在彈窗中顯示圖片
                                $('.photoPopup img').attr('src',photoUrl);
                                // $('.photoPopup img').attr('src','/public'+photoUrl.trim('/'));

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
