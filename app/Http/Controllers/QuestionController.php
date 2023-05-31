<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Product;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Libraries\MemberAuth;

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
    // 處理回覆表單的提交
    $ans = new Answer;
    $ans -> question_id = $question-> id;
    $ans -> member_id = $question-> member_id;
    $ans -> answer = $request -> answer;

    $ans->save();

    return redirect()->route('faqs.index')
    ->with('success', 'Question created successfully.');
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
            'product_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'video' => 'nullable|mimes:mp4,mov,avi',
        ]);
        
        $question = new Question;
        $question -> product_id = $request->input('product_id');
        $question -> member_id =  MemberAuth::member()->id;
        $question -> title = $request -> input('title');
        $question -> content = $request -> input('content');

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
        $message = '已成功提交！';

        //將訊息儲存到 Session 中
        $request -> session()->flash('success',$message);

        // $url = url()->previous(); // 取得當前頁面的 URL
        // return redirect($url); // 重新導向當前頁面

        // 重新導向回當前頁面並顯示成功訊息
        return redirect()->back()->with('success', $message);
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
        
        session()->flash('subpage','question-list');

        // return response()->json(['success' => true]);


        return redirect()->back()
        ->with('success','Question deleted successfully');
        

        // $subpage= session('subpage');

        // if($subpage){
        //     return redirect()->route('faqs.index')
        //            ->with('success','Question deleted successfully');
        
        // }
        // else{
        //     return redirect()->route('questions.index')
        //     ->with('success', 'Question deleted successfully.');
        // }
       
    
    }
}
