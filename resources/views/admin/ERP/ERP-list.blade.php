@extends('layouts.admin.content')

@section('content')
    <div class="Show_">
        <div class="Show_form">
            <h3>ERP資料</h3>
            <a class="btn" href="{{ route('questions.index') }}">返回列表</a>
            <table>
                <thead>
                    <tr>
                        <th>客戶編號</th>
                        <th>機械型號</th>
                        <th>產品名稱</th>
                        <th>註解</th>

                        <!-- 其他欄位 -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tbm10Data as $tbm10)
                        <tr>
                            <td>{{ $tbm10->bj011 }}</td>
                            <td>{{ $tbm10->bj02 }}</td>
                            <td>{{ $tbm10->bj031 }}</td>
                            <td>{{ $tbm10->bj032 }}</td>
                            <!-- 其他欄位 -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- {{ $tbm10Data->links() }} -->
            {{ $tbm10Data->render('components.pagination') }}
        </div>
    </div>
@endsection
