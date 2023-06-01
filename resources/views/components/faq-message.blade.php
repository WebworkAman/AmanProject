
         
<div class="listblock">
             <div class="topline"></div>
             
             @if($faqs->isEmpty())
                  <h2>此機型暫無提供常見問題</h2>
             @else
                 @foreach($faqs as $faq)
               
                 <ul>
                    <li class="faq-title"> 
                        <h5>常見問題</h5>
                        <p><pre>{{$faq->question}}</pre></p></li>
                    <li class="faq-content"> 
                        <h5>問題回覆</h5>
                        <p><pre>{{$faq->answer}}</pre></p>
                    </li>
                 </ul>
                <!-- <table>
                      <thead>
                             <tr>
                                 <th>常見問題</th>
                                 <th>問題回覆</th>
                             </tr>
                      </thead>
                      <tbody>
                              <td><p class="faq-title"><pre>{{$faq->question}}</pre></p></td>
                              <td><p class="faq-content"><pre>{{$faq->answer}}</pre></p></td>
                      </tbody>
                </table> -->
                 @endforeach
             @endif
             
</div>

