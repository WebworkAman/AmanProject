<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Product;
use App\Models\Answer;
use App\Models\Setting;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Libraries\MemberAuth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewQuestionNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\NewAnswerNotification;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //顯示問題列表
    // public function index()
    // {
    //     $questions = Question::all();

    //     return view('admin.index', compact('questions'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.Question.question_answer', compact('products'));
    }
    public function reply(Question $question)
    {
        return view('admin.Question.question-reply', compact('question'));
    }
    public function storeReply(Request $request, Question $question)
    {

        $answer = $question->answers->first();
        $adminId = session()->get('adminId');

        if($answer){

             //如果已存在回覆，則更新回覆內容
             $answer->answer = $request->answer;
             $answer->save();

         }else{

              // 處理回覆表單的提交
              $newans = new Answer;
              $newans -> question_id = $question-> id;
              $newans -> member_id = $question-> member_id;
              $newans -> answer = $request -> answer;
              $newans -> admin_id = $adminId;

              $newans->save();

              //更新question的answer_stat狀態

              $question->answer_stat = 'y';

              $question->save();

              //取得用戶信箱
              $memberEmail = $question->member->email;

              $message = '親愛的歐西瑪客戶您好：';
              $message.= '本公司專員已在貴公司產品'. $question->machine_serial. '提出相關產品回覆於CRM系統上，回覆詳情請上CRM系統查看，非常感謝您！';
              $routeToRemember = route('home');
              $link = '<a href="' . $routeToRemember . '?remember_route=true" class="f-fallback button" target="_blank">按此前往</a>';


              $mail_data = [
                'recipient'=>$memberEmail,
                'fromEmail'=>$memberEmail,
                'fromName'=>$request->name,
                'subject'=>'CRM系統回覆機器問題通知',
                'routeToRemember'=>$routeToRemember,
                'link'=> $link,
                'body'=> $message,

            ];
            \Mail::send('emails.adminReply-notification',$mail_data,function($message)use($mail_data){
                $message->to($mail_data['recipient'])
                        ->from(config('mail.from.address'), config('mail.from.name'))
                        ->subject($mail_data['subject']);
            });

              //發送郵件通知
            //   Mail::to($memberEmail)->send(new NewAnswerNotification($question));


          }
              return redirect()->route('questions.index')
              ->with('success', '回覆儲存成功.');
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'machine_model' => 'required',
            'machine_serial' => 'required',
            'product_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'video' => 'nullable|mimes:mp4,mov,avi',
        ]);

        $memberId = session()->get('memberId');
        $ERPId = Member::where('id',$memberId)->value('company_ERP_id');

        $memberName = MemberAuth::member()->name;

        $question = new Question;
        $question -> product_id = $request->input('product_id');
        $question -> member_id =  MemberAuth::member()->id;
        $question -> title = $request -> input('title');
        $question -> content = $request -> input('content');
        $question -> company_ERP_id = $ERPId;
        // 存儲選擇的機器型號和序號
        $question->machine_model = $request->input('machine_model');
        $question->machine_serial = $request->input('machine_serial');




        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo ->getClientOriginalExtension();
            $photoPath = $photo->storeAs('public/photos',$photoName);
            $question->photo = $photoPath;
        }
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $videoPath = $video->storeAs('public/videos', $videoName);
            $question->video = $videoPath;
        }

        $question->save();

        // 提交成功後的訊息
        $Webmessage = '已成功提交！';

        //將訊息儲存到 Session 中
        $request -> session()->flash('success',$Webmessage);

        //寄送通知郵件給收信者
        // $emailAddress = Setting::find(1)->email_address;
        $emailAddresses = explode(',', Setting::find(1)->email_address);

        $message = '親愛的歐西瑪客服人員您好：';
        $message.= '本公司的客戶'. $ERPId . ':' . $memberName .'已在一台'.$question->machine_model.'-'.$question->machine_serial.'於CRM系統發出提問，請您點此回覆客戶相關產品的提問，非常感謝您！';
        $message.= '問題標題：'.$question->title;
        $message.= '問題內容：'.$question->content;
        $routeToRemember = route('questions.index');
        $link = '<a href="' . $routeToRemember . '?remember_route=true" class="f-fallback button" target="_blank">按此前往</a>';

        foreach ($emailAddresses as $emailAddress) {

        $mail_data = [
            'recipient'=>$emailAddress,
            'fromEmail'=>$emailAddress,
            'fromName'=>$request->name,
            'subject'=>'CRM系統客戶新增問題通知',
            'routeToRemember'=>$routeToRemember,
            'link'=> $link,
            'title'=> $question -> title,
            'body'=> $message,

        ];

        // $questionData = [
        //     'title' => $question->title,
        //     'content' => $question->content,
        // ];

        //使用通知類別發送郵件
        \Mail::send('emails.question-notification',$mail_data,function($message)use($mail_data){
            $message->to($mail_data['recipient'])
                    ->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject($mail_data['subject']);
        });
         }

        // $notification = new NewQuestionNotification($questionData);
        // Notification::route('mail',$emailAddress)->notify($notification);

        // foreach ($emailAddresses as $emailAddress) {
        //     Notification::route('mail', $emailAddress)->notify($notification);
        // }


        // $url = url()->previous(); // 取得當前頁面的 URL
        // return redirect($url); // 重新導向當前頁面

        // 重新導向回當前頁面並顯示成功訊息
        return redirect()->back()->with('success', $Webmessage);
    }

    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class,'notifiable')->orderBy('created-at','desc');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($product_title)
    {
        $product = Product::where('title', $product_title)->firstOrFail();
    return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();


        return redirect()->back()
        ->with('success','客戶問題刪除成功');


    }
}
