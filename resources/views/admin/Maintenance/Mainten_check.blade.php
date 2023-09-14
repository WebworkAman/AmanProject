@extends('layouts.admin.content')

@section('content')
    <div class="Show_">
        <div class="Show_form">
            <h3>設備維修履歷</h3>
            <a class="btn" href="{{ route('Maintenance.List') }}">返回列表</a>




            <div class="Maintenance_tableCheck">
                <ul>
                    <li>
                        維修編號
                        <span>{{ $maintenanceRecord->id }}</span>
                    </li>
                    <li>
                        客戶姓名
                        <span>{{ $maintenanceRecord->customer_name }}</span>
                    </li>
                    <li>
                        廠別
                        <span>{{ $maintenanceRecord->factory }}</span>
                    </li>
                </ul>
                <ul>
                    <li>
                        設備型號/名稱
                        <span>{{ $maintenanceRecord->equipment_model }}</span>
                    </li>
                    <li>
                        購買日期
                        <span>{{ $maintenanceRecord->purchase_date }}</span>
                    </li>
                </ul>
                <ul>
                    <li>
                        機器序號
                        <span>{{ $maintenanceRecord->serial_number }}</span>
                    </li>
                    <li>
                        裝機日期
                        <span>{{ $maintenanceRecord->installation_date }}</span>
                    </li>
                </ul>
                <h3>設備維護及故障維修記錄履歷</h3>
                <ul>
                    <li>維修日期
                        <ol>
                            <li>{{ $maintenanceRecord->maintenance_date }}</li>
                        </ol>
                    </li>

                    <li>維護及故障維修描述狀況
                        <ol>
                            <li>{{ $maintenanceRecord->description }}</li>
                        </ol>
                    </li>
                    <li>維修內容/更換零件
                        <ol>
                            <li>{{ $maintenanceRecord->maintenance_content }}</li>
                        </ol>
                    </li>
                    <li>數量
                        <ol>
                            <li>{{ $maintenanceRecord->quantity }}</li>
                        </ol>
                    </li>
                    <li>維修人員
                        <ol>
                            <li>{{ $maintenanceRecord->maintenance_personnel }}</li>
                        </ol>
                    </li>
                </ul>



            </div>
        </div>
    </div>
@endsection
