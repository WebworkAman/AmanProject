      
      
      @csrf
      <p><label for="title">標題：</label></p>
        <input type="text" name="title">
        <p><label for="content">問題詳情：</label></p>
        <textarea id="content" name="content"  cols="30" rows="10"></textarea>
        <p><label for="content">附加檔案：</label></p>
            <input type="file" name="photo">
        <p>
            <input class='submit' type="submit" name="submit" value="提 交">
        </p>