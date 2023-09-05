@csrf

<p><label for="machine_model">購買機器型號</label></p>
<select name="machine_model" id="machine_model" class="form-control" required>
    @foreach ($machines as $machine)
        <option value="{{ $machine->machine_model }}">{{ $machine->machine_model }}</option>
    @endforeach
</select>

<p><label for="machine_serial">購買機器序號</label></p>
<select name="machine_serial" id="machine_serial" class="form-control" required>
    @foreach ($machines as $machine)
        <option value="{{ $machine->machine_serial }}">{{ $machine->machine_serial }}</option>
    @endforeach
</select>
<p><label for="title">標題：</label></p>
<input type="text" name="title">
<p><label for="content">問題詳情：</label></p>
<textarea id="content" name="content" cols="30" rows="10"></textarea>
<p><label for="content">附加照片：</label></p>
<input class="attachfile" type="file" name="photo" accept="image/jpeg, image/png, image/gif">
<p><label for="video">附加影片：</label></p>
<input class="attachfile" type="file" name="video" accept="video/mp4, video/mov, video/avi">
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
