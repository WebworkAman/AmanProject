@extends('layouts.content')

@section('content')
    <main>

        @include('components.question-title')
        <div class="QA_content">
            <!-- <div class="left-content">
                    <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/OP-114S-600-2.png">
                    <h2>摺邊封膠包邊多功能機 OP-114S</h2>
                    <h3>用於曲線加工</h3>
                </div> -->
            <div class="right-content">

                <div class="filter">
                    <form method="get" action="{{ route('OP114SView') }}">
                        <label for="start_date">開始日期：</label>
                        <input type="date" name="start_date" id="start_date">
                        <label for="end_date">結束日期：</label>
                        <input type="date" name="end_date" id="end_date">
                        <button type="submit">搜尋</button>
                    </form>
                </div>
                {{-- <div class="baseline"></div> --}}
                <div class="filter">
                    <form method="get" action="{{ route('OP114SView') }}">
                        <label for="filter">問題篩選：</label>
                        <select name="filter" id="filter">
                            <option value="personal">個人問題</option>
                            <option value="company">公司問題</option>
                        </select>
                        <button type="submit">篩選</button>
                    </form>
                </div>
                {{-- <div class="baseline"></div> --}}
                <div class="filter btnblock">
                    <button class="showPostBtn">我要提問</button>
                </div>

                <div class="Show_form">
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

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>
                                        <p>{{ $question->member->name }}</p>
                                    </td>
                                    @if ($question->product_id)
                                        <td>{{ $products->find($question->product_id)->title }}</td>
                                    @else
                                        <td>沒查詢到對應產品</td>
                                    @endif
                                    <td>
                                        <p>{{ $question->title }}</p>
                                    </td>
                                    <td>
                                        <p id='truncated-text'>{{ $question->content }}</p>
                                    </td>
                                    <td>
                                        @if ($question->photo)
                                            <button class="showPhotoBtn"
                                                data-photo-url="{{ Storage::url($question->photo) }}">
                                                檢視照片
                                            </button>
                                            <div class="photoPopup" style="display: none">
                                                <img src="{{ asset('storage/photos/' . basename($question->photo)) }}"
                                                    alt="Question Photo">
                                                <button class="popclose">關閉</button>
                                            </div>
                                        @else
                                            <p>無</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($question->video)
                                            <button class="showVideoBtn"
                                                data-video-url="{{ Storage::url($question->video) }}">
                                                檢視影片
                                            </button>
                                            <div class="videoPopup" style="display: none">
                                                <video controls>
                                                    <source
                                                        src="{{ asset('storage/videos/' . basename($question->video)) }}"
                                                        type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <button class="popclose">關閉</button>
                                            </div>
                                        @else
                                            <p>無</p>
                                        @endif
                                    </td>
                                    <td>

                                        <button class="reply-button" data-question-id="{{ $question->id }}">
                                            查看回覆
                                        </button>
                                        <div class="popup" style="display: none">
                                            <div class="popup-content">

                                                @if ($question->answers->count() > 0)
                                                    <h3>歐西瑪回覆:</h3>
                                                    @foreach ($question->answers as $answer)
                                                        <div class="textContent">
                                                            <pre class="pre-wrap">{{ $answer->answer }}</pre>

                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>暫無回答</p>
                                                @endif
                                            </div>
                                            <button class="popclose">關閉</button>
                                        </div>
                            @endforeach
                            </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                @if (session('success'))
                    <div class="alert alert-success popup">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="questionPostpop" style="display: none">
                    <button class="closePostBtn">關閉</button>

                    <form method="post" action="{{ route('OP-114S') }}" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="35">
                        @include('layouts.question-post')
                    </form>
                </div>
            </div>


        </div>




    </main>
@endsection
