
         
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
                              <p><pre>{{$faq->question}}</pre></p>
                            <button class="faq-toggle">+</button>
                        </div>
                        <div class="faq-content">
                            <p><pre>{{$faq->answer}}</pre></p>
                        </div>

                    </li>
                 </ul>
                 @endforeach
             @endif
             
</div>

