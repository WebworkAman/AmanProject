<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Libraries\MemberAuth;


class MessageController extends Controller
{
    public function __invoke(Request $request){
        //驗證資料
        //title 為必需字串; content 可以為空白字串

        $request->validate([
            'title'=>'required|string',
            'content'=>'string|nullable',
        ]);

        
            //取得目前登入者資訊
            $user =  MemberAuth::member()->name; //取得目前登入者資訊

        

        // $user = Message::user(); //取得目前登入者資訊
        // $name = $user ? $user->name : Str::random(8); // 如果有登入，就使用登入者名稱，否則隨機產生

        Message::create([
            'name' => $user,
            'title' => $request -> title,
            // 當 content 為空時，使用 「無內文為預設值 」
            'content' => $request->content ?? '無內文',
        ]);

        // 回傳字串表示建立成功建立，之後再修改

        return redirect()->route('view');
    }
}
