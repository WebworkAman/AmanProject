<div class="Show_form">
    <h3>設備維修履歷</h3>
    <a class="btn" href="{{route('Maintenance.create')}}">新增設備維修履歷</a>

    <table>
    <thead>
            <tr>
                <th>維修編號</th>
                <th>客戶姓名</th>
                <th>設備型號</th>
                <th>機器序號</th>
                <th>建立日期</th>
                <th></th>
                <th></th>
            </tr>
    </thead>
    <tbody>
    @foreach ($maintenanceRecords as $maintenanceRecord)
    <tr>
              <td>
             {{ $maintenanceRecord->id}}
             </td>
             <td>
             {{ $maintenanceRecord->customer_name }}
             </td>
             <td>
             {{ $maintenanceRecord->equipment_model }}
             </td>
             <td>
             {{ $maintenanceRecord->serial_number }}
             </td>
             <td>
             {{ $maintenanceRecord->created_at->format('Y-m-d') }}
             </td>
             
             <td ><a class='data-check' href="{{route('Maintenance.check',$maintenanceRecord->id)}}">檢視內容</a></td>
             
             <td>
                <form method="POST" action="{{ route('Maintenance.destroy', $maintenanceRecord->id) }}">
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