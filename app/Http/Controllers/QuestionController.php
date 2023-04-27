<?php

namespace App\Http\Controllers;

use App\Models\Question;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $question->save();

        $url = url()->previous(); // 取得當前頁面的 URL
        return redirect($url); // 重新導向當前頁面
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

        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully.');
    
    }
}
