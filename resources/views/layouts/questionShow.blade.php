<div class="message_border">
             @foreach($questions as $question)
             <div class="message">
             
              <p>標題：{{ $question->title }}</p>
              <p>內容：{{ $question->content }}</p>
              <p>日期：{{ $question->created_at }}</p>
              <p>姓名：{{ $question->photo}}</p>
             </div>
             @endforeach
</div>