@extends('layouts.admin.content')

@section('content')

    <main>
    
    
    <div class="admin_block">

         @include('layouts.admin.control')

         <div class="Show_ reply">

         <div class="Show_form member-permissions">
                    <div class="text-block">
                        <h3> 權 限 管 理 </h3>
                        <a class="btn" href="{{ asset('admin/index') }}">返回會員</a>
                    </div>

                    <form action="{{ route('member.permissions.update',$member->id) }}" method="POST">
                         @csrf

                         <!-- 顯示所有產品的複選框 -->
 
                    <div class="checkSelect">
                       <label class="selectAll">
                                <input type="checkbox" id="select-all">
                                授權所有產品權限
                       </label>
                       <div class="baseline"></div>
                     <ul id="product-list">
                     @foreach ($products as $product)
                                 <li>
                                     <label>
                                         <input type="checkbox" name="products[]" value="{{ $product->id }}"
                                             @if (in_array($product->id,array_column($memberPermissions, 'id')))
                                                 checked 
                                             @endif>

                                         {{ $product->title }}
                                     </label>
                                 </li>
                     @endforeach
                     </ul>
                     </div>

                      
                      <button type="submit">更新權限</button>
                  </form>
 
                       @stack('scripts')
</div>

        </div>

    </div>

   </main>
   @php
    // 將 $memberPermissions 的值輸出到控制台
    echo "<script>console.log('memberPermissions:', " . json_encode($memberPermissions) . ");</script>";
   @endphp

   <script>
    $(document).ready(function(){
        // 監聽 "All" 選項的變更事件
           $('#select-all').change(function(){
               var isChecked = $(this).prop('checked');
               
               //設定所有產品選項的勾選狀態與 "All" 選項一致
               $('#product-list input[type="checkbox"]').prop('checked',isChecked);

           });
    })
   </script>
    
   @endsection