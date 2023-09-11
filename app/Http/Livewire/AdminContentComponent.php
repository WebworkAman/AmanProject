<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FAQ;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Member;

class AdminContentComponent extends Component
{

        public $subblockContent = ''; // 子區塊的內容
        public $currentPage = 'setting'; // 默認選中的子頁面，可以根據需要修改
        public $page;

        public function mount($page)
        {

            $this->page = $page;
            $this->loadPageContent();
        }
        public function loadPageContent(){
            if ($this->page === 'faq-list') {
                $faqs = FAQ::paginate(5); // 獲取所有的FAQ紀錄
                $products = Product::all();
                $page = 'faq-list';
                $this->subblockContent = view("admin.FAQ.faq-list", compact('faqs', 'products','page'))->render();
            } elseif ($this->page === 'member-list') {
                $members = Member::all();
                $page = 'member-list';
                $this->subblockContent = view('admin.Member.member-list',compact('page','members'))->render();
            } elseif ($this->page === 'setting') {
                $emailAddresses = Setting::findOrFail(1) -> email_address;
                $page = 'setting';
                $this->subblockContent = view('admin.Setting.setting',compact('emailAddresses','page'))->render();
            }
        }

        public function render(){

            // if($this->page === 'faq-list'){
            //     $faqs = FAQ::paginate(5); //獲取所有的FAQ紀錄
            //     $products = Product::all();

            //     $this->subblockContent = view("admin.FAQ.faq-list", compact('faqs', 'products'))->render();
            // }elseif($this->page === 'setting'){

            //     $this->subblockContent = view('admin.Setting.setting')->render();

            // }

        return view('livewire.admin-content-component',[
            'subblockContent' => $this->subblockContent,
            'page' => $this->page
        ]);

        }

        // public function switchPage($page)
        // {
        //     $this->currentPage = $page;
        // }

        public function switchPage($page)
        {
            $this->page = $page;
            $this->loadPageContent();
            // $this->render();

            // // 根据页面标识加载不同的子页面内容
            // if ($page === 'setting') {
            //     // 加载管理设置页面的内容
            //     $this->subblockContent = view('admin.setting')->render();
            // } elseif ($page === 'member-list') {
            //     // 加载会员管理页面的内容
            //     $this->subblockContent = view('admin.member-list')->render();
            // } elseif ($page === 'faq-list') {
            //     // 加载常见问题页面的内容
            //     $this->loadFaqList();
            // }

        }


        public function loadMemberList()
        {
            $this->page = 'member-list';
            $this->subblockContent = view('admin.Member.member-list')->render();
        }

        public function loadFaqList(){
            $this->subblockContent = view('admin.FAQ.faq-list')->render();
        }

}
