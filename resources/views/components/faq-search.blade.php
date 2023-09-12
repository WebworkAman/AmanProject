<form class="search" action="{{ route('faqs.search') }}" method="GET">
    <div class="form-group">

    </div>

    <input type="text" name="keyword" placeholder="輸入想搜尋問題">
    <button type="submit">搜尋</button>
    @if (session('error'))
        <div class="alert alert-danger">
            <p>{{ session('error') }}</p>
        </div>
    @endif

</form>
