
         
<div class="listblock">
             <div class="topline"></div>
             
             @if($faqs->isEmpty())
                  <h2>此機型暫無提供常見問題</h2>
             @else
                 @foreach($faqs as $faq)
               
                 <ul>
                    <li>
                     <p class="faq-title"><span>Q.</span>{{$faq->question}}</p>
                     <p class="faq-content"><span>A.</span>{{$faq->answer}}</p>
                     
                    </li>
                 </ul>
               
                 @endforeach
             @endif
             
</div>

