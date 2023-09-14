@extends('layouts.admin.content')

@section('content')
    <div class="Show_">
        <div class="Show_form question-list">
            <h3>客戶問題區管理</h3>

            <a href="{{ route('ERP.List') }}" class="btn">查閱ERP資料</a>

            <table>
                <thead>
                    <tr>
                        <th style="width:5%;min-width:100px;">客戶姓名</th>
                        <th style="width:20%">產品</th>
                        <th style="width:20%">標題</th>
                        <th style="width:30%">內容</th>
                        <th style="width:5%;text-align:center;min-width: 50px;">照片</th>
                        <th style="width:5%;text-align:center;min-width: 50px;">影片</th>
                        <th style="width:5%;text-align:center;min-width: 50px;"></th>
                        <th style="width:5%;text-align:center;min-width: 50px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>
                                {{ $question->member->name }}
                            </td>
                            @if ($question->product_id)
                                <td>{{ $products->find($question->product_id)->title }}</td>
                            @else
                                <td>沒查詢到對應產品</td>
                            @endif
                            <td style="width:20%">
                                {{ $question->title }}
                            </td>
                            <td style="width:30%">
                                {{ $question->content }}
                            </td>
                            <td style="width:7%;text-align:center">
                                @if ($question->photo)
                                    <button class="showPhotoBtn" data-photo-url="{{ Storage::url($question->photo) }}">
                                        檢視照片
                                    </button>
                                    <div class="photoPopup" style="display: none">
                                        <img src="{{ asset('storage/photos/' . basename($question->photo)) }}"
                                            alt="Question Photo">
                                        <button class="popclose">關閉</button>
                                    </div>
                                @else
                                    無
                                @endif
                            </td>
                            <td style="width:7%;text-align:center">
                                @if ($question->video)
                                    <button class="showVideoBtn" data-video-url="{{ Storage::url($question->video) }}">
                                        檢視影片
                                    </button>
                                    <div class="videoPopup" style="display: none">
                                        <video controls>
                                            <source src="{{ asset('storage/videos/' . basename($question->video)) }}"
                                                type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <button class="popclose">關閉</button>
                                    </div>
                                @else
                                    無
                                @endif
                            </td>
                            <td style="text-align:center"><a class='question-reply'
                                    href="{{ route('question.answer', $question->id) }}">回覆</a></td>
                            <td style="text-align:center">
                                <form method="POST" action="{{ route('questions.destroy', $question->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $questions->render('components.pagination') }}
            <script>
                //點擊檢視上傳圖片按鈕
                $('.showPhotoBtn').click(function() {
                    //獲取圖片 URL
                    var photoUrl = $(this).data('photo-url');

                    //在彈窗中顯示圖片
                    // $('.photoPopup img').attr('src',photoUrl);
                    $('.photoPopup img').attr('src', '/public' + photoUrl.trim('/'));

                    //顯示彈窗
                    $('.photoPopup').show();

                });

                //點擊關閉按鈕關閉彈窗
                $('.popclose').click(function() {
                    $('.photoPopup').hide();
                })
            </script>
            <script>
                // 點擊檢視上傳影片按鈕
                $('.showVideoBtn').click(function() {
                    // 獲取影片 URL
                    var videoUrl = $(this).data('video-url');

                    // 在彈窗中顯示影片
                    var videoPopup = $(this).next('.videoPopup');
                    //  videoPopup.find('video source').attr('src', videoUrl);
                    videoPopup.find('video source').attr('src', '/public' + videoUrl.trim('/'));
                    videoPopup.find('video')[0].load();

                    // 顯示彈窗
                    videoPopup.show();
                });

                // 點擊關閉按鈕關閉彈窗
                $('.popclose').click(function() {
                    $(this).closest('.videoPopup').hide();
                });
            </script>

            @stack('scripts')
        </div>
    </div>
@endsection
