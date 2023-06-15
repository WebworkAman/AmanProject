<div class="Show_form setting-page">
                    <h3>管 理 設 定</h3>

                    <form method="POST" action="{{ route('settings.store') }}">

                      @csrf
                      @method('PUT')
                      <div class="form-group">
                           <label for="email_address">系統收信設定</label>
                           <input type="email" name="email_address" id="email_address" class="form-control" placeholder="輸入信箱" value="{{ $emailAddress }}" required>                     
                       </div>

                       <button type="submit" class="btn btn-primary">儲存設定</button>

                    </form>

                       
                       @stack('scripts')
</div>