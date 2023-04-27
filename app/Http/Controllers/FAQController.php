<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\FAQ;

class FAQController extends Controller
{

    public function create()
    {
        return view('admin.FAQ.create');
    }

    public function OC40N02(){
        return view('product.FAQ.inspection.OC40N02');
    }
    
    public function OC1(){
        $faqs = FAQ::where('product_id', 2)->get();
        return view('product.FAQ.inspection.OC1', compact('faqs')) ;
    }
    
    public function create3(){
        return view('product.FAQ.spreading');
    }
    public function create5(){
        return view('product.FAQ.spreading');
    }


    public function TAC(){
        return view('product.FAQ.cutting.TAC');

    }
    // 管理者
    public function index()
    {
        $faqs = FAQ::all();

        return view('admin.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'question' => 'required|max:255',
            'answer' => 'required',
            
        ]);
        // 將 product_id 設為 1
        
        $faq = FAQ::create($validatedData);

        return redirect()->route('faqs.index', $faq->id)
            ->with('success', 'Question created successfully.');
    }

    

    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.index')
            ->with('success', 'Question deleted successfully.');
    
    }
}