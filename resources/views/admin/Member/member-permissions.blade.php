@extends('layouts.admin.content')

@section('content')

    <main>
    
    
    <div class="admin_block">

         @include('layouts.admin.control')

         <div class="Show_ reply">

         <div class="Show_form member-permissions">
                    <h3> 權 限 管 理 </h3>
                    <a class="btn control-option" href="{{route('members.adminCreate')}}">提交更新</a>
                    <form action="{{ route('members.adminSetPermissions') }}" method="POST">
    @csrf

    <!-- 显示所有产品的复选框 -->
 
        <div class="checkSelect">
            <ul>
            @foreach ($products as $product)
                <li>            <label>
                <input type="checkbox" name="products[]" value="{{ $product->id }}">
                    
                {{ $product->title }}
            </label></li>    @endforeach
            </ul>

        </div>


    <button type="submit">更新權限</button>
</form>
 
                       @stack('scripts')
</div>

        </div>

    </div>

   </main>
    
   @endsection