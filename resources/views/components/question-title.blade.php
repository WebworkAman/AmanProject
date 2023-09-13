<div class="productQuestionTitle">
    <h1> 產 品 問 題 </h1>
    @foreach ($questions as $question)
        @if ($question->product_id)
            <h2>{{ $products->find($question->product_id)->title }}</h2>
        @else
            <td>沒查詢到對應產品</td>
        @endif
    @endforeach
</div>
