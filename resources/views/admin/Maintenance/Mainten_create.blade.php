@extends('layouts.admin.content')

@section('content')
    <div class="Show_">
        <div class="Show_form question-list">
            <div class="Maintenance_table">
                <h3>新增維修履歷</h3>

                <form action="{{ route('Maintenance.store') }}" method="POST">
                    @csrf

                    <!-- 客戶名稱 -->
                    <div class="form-group">
                        <label for="customer_name">客戶名稱</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>

                    <!-- 廠別 -->
                    <div class="form-group">
                        <label for="factory">廠別</label>
                        <input type="text" name="factory" class="form-control" required>
                    </div>

                    <!-- 設備型號／名稱 -->
                    <div class="form-group">
                        <label for="equipment_model">設備型號／名稱</label>
                        <input type="text" name="equipment_model" class="form-control" required>
                    </div>

                    <!-- 購買日期 -->
                    <div class="form-group">
                        <label for="purchase_date">購買日期</label>
                        <input type="date" name="purchase_date" class="form-control" required>
                    </div>

                    <!-- 機器序號 -->
                    <div class="form-group">
                        <label for="serial_number">機器序號</label>
                        <input type="text" name="serial_number" class="form-control" required>
                    </div>

                    <!-- 裝機日期 -->
                    <div class="form-group">
                        <label for="installation_date">裝機日期</label>
                        <input type="date" name="installation_date" class="form-control" required>
                    </div>

                    <!-- 維修日期 -->
                    <div class="form-group">
                        <label for="maintenance_date">維修日期</label>
                        <input type="date" name="maintenance_date" class="form-control" required>
                    </div>

                    <!-- 維護及故障維修描述狀況 -->
                    <div class="form-group">
                        <label for="description">維護及故障維修描述狀況</label>
                        <textarea name="description" class="form-control" rows="5" required></textarea>
                    </div>

                    <!-- 維修內容/更換零件 -->
                    <div class="form-group">
                        <label for="maintenance_content">維修內容/更換零件</label>
                        <textarea name="maintenance_content" class="form-control" rows="5" required></textarea>
                    </div>

                    <!-- 數量 -->
                    <div class="form-group">
                        <label for="quantity">數量</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>

                    <!-- 維修人員 -->
                    <div class="form-group">
                        <label for="maintenance_personnel">維修人員</label>
                        <input type="text" name="maintenance_personnel" class="form-control" required>
                    </div>
                    <div class="btn-block">
                        <button type="submit" class="btn-primary">新增</button>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
