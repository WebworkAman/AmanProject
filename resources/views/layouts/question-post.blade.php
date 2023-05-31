      
      
      @csrf
      <p><label for="title">標題：</label></p>
        <input type="text" name="title">
        <p><label for="content">問題詳情：</label></p>
        <textarea id="content" name="content"  cols="30" rows="10"></textarea>
        <p><label for="content">附加照片：</label></p>
            <input class="attachfile" type="file" name="photo">
        <p><label for="video">附加影片：</label></p>
            <input class="attachfile" type="file" name="video">
        <p>
            <input class='submit' type="submit" name="submit" value="提 交">
        </p>

        <!-- 照片驗證錯誤訊息 -->
        @error('photo')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <!-- 影片驗證錯誤訊息 -->
        @error('video')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror