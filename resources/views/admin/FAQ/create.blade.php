@extends('layouts.admin.content')

@section('content')

    <main>
    
    
        <div class="admin_block">

        @include('layouts.admin.control')

            <div class="Show_ reply">
                <div class="Show_form">
                    <div class="question_reply">
                    <div class="nav">
                          <h3>新增常見問題</h3>

                          <a class="btn" href="{{ asset('admin/index') }}">返回列表</a>
                    </div>
                    
                <div class="create-faq">
                    <form method="POST" action="{{ route('faqs.store') }}" enctype="multipart/form-data">
                         @csrf
                         <div class="form-group select">
                             <label for="product_id">請選擇產品(複選)</label>
                             <select name="product_id[]" id="product_id" class="form-control" multiple required>
                                  @foreach ($products as $product)
                                      <option value="{{ $product -> id }}">{{ $product ->title }}</option>
                                  @endforeach
                             </select>
                        </div>
                        <div class="form-group" id="selectedItems"></div>

                        <div class="form-group">
                            <label for="question">問題 :</label>
                            <textarea name="question" id="question" class="form-control" required>{{ old('question') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="answer">回答 :</label>
                            <textarea name="answer" id="answer" class="form-control" required>{{ old('answer') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">附加照片：</label>
                            <input class="attachfile" type="file" name="photo" accept="image/jpeg, image/png, image/gif">
                        </div>
                        <div class="form-group">
                            <label for="video">附加影片：</label>
                            <input class="attachfile" type="file" name="video" accept="video/mp4, video/mov, video/avi">
                        </div>

                        <div class="form-group">
                            <div class="text-right">
                            <button type="submit" class="btn btn-primary">新增</button>

                        </div>
                    </div>
                    </form>
                </div>
                    
                </div>
                    

                   
                </div>
                
                
            </div>
            </div>
        </div>

   </main>
<!-- <script>
    $(document).ready(function() {
  // 檢查 localStorage 中是否有已儲存的項目值
  var storedItems = localStorage.getItem('selectedItems');
  if (storedItems) {
    var selectedItems = JSON.parse(storedItems);
    // 顯示已儲存的項目值
    showSelectedItems(selectedItems);
  }

  // 監聽多選框的變更事件
  $('#product_id').on('change', function() {
    var selectedItems = [];
    // 取得選取的項目值
    $('#product_id option:selected').each(function() {
      selectedItems.push($(this).val());
    });

    // 儲存選取的項目值到 localStorage
    localStorage.setItem('selectedItems', JSON.stringify(selectedItems));

    // 顯示已選取的項目值
    showSelectedItems(selectedItems);
  });

  // 顯示已選取的項目值
//   function showSelectedItems(selectedItems) {
//     var selectedItemsDiv = $('#selectedItems');
//     selectedItemsDiv.empty();

//     if (selectedItems.length > 0) {
//       selectedItemsDiv.append('<strong>已選取的項目：</strong><br>');

//       $.each(selectedItems, function(index, value) {
//         var optionText = $('#product_id option[value="' + value + '"]').text();
//         selectedItemsDiv.append(value + '<br>');
//       });
//     }
//   }

  // 顯示已選取的項目名稱
  function showSelectedItems(selectedItems) {
  var selectedItemsDiv = $('#selectedItems');
  selectedItemsDiv.empty();

  if (selectedItems.length > 0) {
    selectedItemsDiv.append('<strong>已選取的項目：</strong><br>');

    $.each(selectedItems, function(index, value) {
      var optionText = $('#product_id option[value="' + value + '"]').text();
      selectedItemsDiv.append(optionText + '<br>');
    });
  }
}
});

</script> -->

<script>
    $(document).ready(function() {
    // 檢查 localStorage 中是否有已儲存的項目值
    var storedItems = localStorage.getItem('selectedItems');
    if (storedItems) {
        var selectedItems = JSON.parse(storedItems);
        // 顯示已儲存的項目值
        showSelectedItems(selectedItems);
    }

    // 監聽多選框的變更事件
    $('#product_id').on('change', function() {
        var selectedItems = [];
        // 取得選取的項目值
        $('#product_id option:selected').each(function() {
            selectedItems.push($(this).val());
        });

        // 儲存選取的項目值到 localStorage
        localStorage.setItem('selectedItems', JSON.stringify(selectedItems));

        // 顯示已選取的項目值
        showSelectedItems(selectedItems);
    });

// 顯示已選取的項目值
function showSelectedItems(selectedItems) {
    var selectedItemsDiv = $('#selectedItems');
    selectedItemsDiv.empty();

    if (selectedItems.length > 0) {
        selectedItemsDiv.append('<label>已選取的項目：</label><br>');

        var ul = $('<ul></ul>');

        for (var i = 0; i < selectedItems.length; i++) {
            var selectedItemId = selectedItems[i];
            var optionText = $('#product_id option[value="' + selectedItemId + '"]').text();
            // selectedItemsDiv.append(optionText + '<br>');
            ul.append('<li>' + optionText + '</li>');
        }
            selectedItemsDiv.append(ul);
    }
}
});

</script>
    

   @endsection 



