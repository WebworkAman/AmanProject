<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __invoke(Request $request){
        //驗證資料
        //title 為必需字串; content 可以為空白字串

        $request->validate([
            'title'=>'required|string',
            'content'=>'string|nullable',
        ]);

        Message::create([
            'name' => Str::random(8),
            'title' => $request -> title,
            // 當 content 為空時，使用 「無內文為預設值 」
            'content' => $request->content ?? '無內文',
        ]);

        // 回傳字串表示建立成功建立，之後再修改

        return redirect()->route('view');
    }
}
