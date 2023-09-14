@extends('layouts.admin.content')

@section('content')
    <div id="show" class="Show_">
        <div class="Show_form member-list">
            <h3 style="margin-bottom:35px"> 會 員 管 理 </h3>
            {{-- <a class="btn control-option" href="{{ route('members.adminCreate') }}">新增會員</a> --}}
            <table>
                <thead>
                    <tr>
                        <th>公司編號</th>
                        <th>職位</th>
                        <th>會員姓名</th>
                        <th>會員信箱</th>
                        <th>問題權限</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>
                                <p>{{ $member->company_ERP_id }}</p>
                            </td>
                            @php
                                $identityMap = [
                                    1 => '採購',
                                    2 => '廠長',
                                    3 => '一般會員',
                                ];
                            @endphp
                            <td>
                                <p>{{ $identityMap[$member->identity_perm] ?? '未知身份' }}</p>
                            </td>
                            <td>
                                <p>{{ $member->name }}</p>
                            </td>
                            <td>{{ $member->email }}</td>
                            @if ($member->stat_info === 'y')
                                <td><a href="{{ route('members.adminSetPermissions', $member->id) }}">設定權限</a></td>
                            @else
                                <td>已離職</td>
                            @endif
                            <td>
                                <form method="POST" action="{{ route('members.destroy', $member->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @stack('scripts')
        </div>
    </div>
@endsection
