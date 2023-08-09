@extends('layouts.content')

@section('content')

     <main>


     <div class="Show_form member-list">
                    <h3>公 司 會 員 管 理 </h3>
                    <a class="btn control-option" href="{{route('members.adminCreate')}}">新增會員</a>
                      <table>
                              <thead>
                                  <tr>
                                      <th>會員姓名</th>
                                      <th>會員信箱</th>
                                      <th>問題權限</th>
                                      <th></th>
                                  </tr>
                              </thead>
                               <tbody>
                                    @foreach ($member as $member)
                                        <tr>
                                            <td><p>{{ $member->name }}</p></td>
                                            <td>{{ $member->email }}</td>
                                            <td><a href="{{ route('members.adminSetPermissions', $member->id) }}">設定權限</a></td>
                                            <td>
                                                <form method="POST" action="{{ route('members.destroy', $member->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">刪除</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                               </tbody>
                       </table>   
                       
                       
</div>



    </div>

        
    </main>


@endsection 