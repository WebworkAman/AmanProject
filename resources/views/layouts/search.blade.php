

<form  class="search" action="{{ route('faqs.search') }}" method="GET">
                         <div class="form-group">
                        
                             <select name="product_id" id="product_id" class="form-control">
                             <option value="" selected>可選填查詢產品</option>
                                  @foreach ($products as $product)
                             <option value="{{ $product -> id }}">{{ $product ->title }}</option>
                                  @endforeach
                             </select>

                             
                        </div>
        
                             <input type="text" name="keyword" placeholder="輸入想搜尋問題">
                             <button type="submit">搜尋</button>
                             @if (session('error'))
                                 <div class="alert alert-danger">
                                     <p>{{ session('error') }}</p>
                                 </div>
                             @endif
    
</form>

