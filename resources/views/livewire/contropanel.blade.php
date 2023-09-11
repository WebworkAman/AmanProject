<aside>


    <div>
        {{-- In work, do what you enjoy. --}}



        {{-- <div class="control_">
            <h3>功能列表</h3>
            <div class="control_list">
                <a href="#" wire:click="switchPage('setting')" class="control-option">管理設定</a>
                <a href="#" wire:click="loadMemberList" class="control-option">會員管理</a>
                <a href="{{ route('admin.page', ['page' => 'faq-list']) }}" class="control-option">常見問題</a>
                <a href="#" wire:click="switchPage('faq-list')" class="control-option">常見問題</a>
                <a href="#" wire:click="switchPage('question-list')" class="control-option">客戶問題</a>
                <a href="#" wire:click="switchPage('maintenance-list')" class="control-option">維修履歷</a>
            </div>
        </div> --}}
        <div class="control_">
            <h3>功能列表</h3>
            <div class="control_list">
                <a href="{{ route('admin.page', ['page' => 'setting']) }}" class="control-option">管理設定</a>
                <a href="{{ route('admin.page', ['page' => 'member-list']) }}" wire:click="switchPage('member-list')"
                    class="control-option">會員管理</a>
                <a href="{{ route('admin.page', ['page' => 'faq-list']) }}" class="control-option">常見問題</a>
                <a href="#" wire:click="switchPage('question-list')" class="control-option">客戶問題</a>
                <a href="#" wire:click="switchPage('maintenance-list')" class="control-option">維修履歷</a>
            </div>
        </div>

    </div>
</aside>
