<div class="message_border">
        @if($questions->isEmpty())
            <p>此機型暫無用戶提問</p>
        @else    
              @foreach($questions as $question)
                <div class="message">
                             <p>姓名：{{ $question->member->name}}</p>
                             <p>標題：{{ $question->title }}</p>
                             <p>內容：{{ $question->content }}</p>
                             <p>
                                日期：{{ $question->created_at }} 
                                <button class="reply-button" data-question-id="{{$question->id}}">
                                    查看回覆
                                </button>
                             </p>
                             <!-- @if($question->photo)
                             <img src="{{ Storage::url($question->photo) }}" alt="Question Photo">
                             @endif -->
               <div class="popup" style="display: none">
                  <div class="popup-content">

                             @if($question->answers->count() > 0)
                             <h3>歐西瑪回覆</h3>
                              @foreach($question->answers as $answer)
                                  <p><pre class="pre-wrap">{{ $answer->answer }}</pre></p>
                              @endforeach
                          @else
                                   <p>暫無回答</p>
                          @endif
                  </div>
                  <button class="popclose">Close</button>
               </div>
               </div>
              @endforeach
        @endif
</div>
<div class="baseline"></div>
<button class="showPostBtn">我要提問</button>
@if (session('success'))
    <div class="alert alert-success popup">
        {{ session('success') }}
    </div>
@endif

<div class="questionPostpop" style="display: none">
<button class="closePostBtn">關閉</button>