@extends('layouts.content')

@section('content')
    <main>

        <h1> 產 品 問 題 </h1>
        <div class="QA_content">
            {{-- <div class="left-content">
                <img src="https://www.oshima.com.tw/archive/image/product1/images/layoutlist/F8-600-2.png">
                <h2>平織拉布機 F8</h2>
                <h3>再黏的膠一定分開</h3>
            </div> --}}
            <div class="right-content QA-content">

                <div class="filter">
                    <form method="get" action="{{ route('F8View') }}">
                        <label for="start_date">開始日期：</label>
                        <input type="date" name="start_date" id="start_date">
                        <label for="end_date">結束日期：</label>
                        <input type="date" name="end_date" id="end_date">
                        <label for="filter">問題篩選：</label>
                        <select name="filter" id="filter">
                            <option value="personal">個人問題</option>
                            <option value="company">公司問題</option>
                        </select>
                        <button type="submit">搜尋</button>
                    </form>
                </div>
                {{-- <div class="baseline"></div> --}}
                {{-- <div class="filter">
                    <form method="get" action="{{ route('F8View') }}">
                        <label for="filter">問題篩選：</label>
                        <select name="filter" id="filter">
                            <option value="personal">個人問題</option>
                            <option value="company">公司問題</option>
                        </select>
                        <button type="submit">篩選</button>
                    </form>
                </div> --}}
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
                                <th style="width: 30%;">內容</th>
                                <th style="text-align: center;width: 10%;">照片</th>
                                <th style="text-align: center;width: 10%;">影片</th>
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
                                    <td style="text-align: center">
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
                                    <td style="text-align: center">
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

                    <form method="post" action="{{ route('F8') }}" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="">

                        @include('layouts.question-post')
                    </form>
                </div>
            </div>


        </div>




    </main>
@endsection
