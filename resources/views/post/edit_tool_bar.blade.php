<div class="edit-tool-bar">
    <div class="item" id="edit-category-btn"><i class="fa fa-tags" aria-hidden="true">カテゴリ</i></div>
    <div class="item"><i class="fa fa-link" aria-hidden="true">リンク</i></div>
    <div class="item"><i class="fa fa-file-picture-o" aria-hidden="true">メディア</i></div>
</div>

<div id="mask" class="fixed hidden"></div>
<div id="edit-category-panel" class="fixed hidden">
    <h2>カテゴリの追加</h2>
    <ul class="categories">
        @if(isset($post->categories))
            @foreach($post->categories as $category)
                <li>{{ $category->name }}</li>
                <input type="hidden" name="categories[]" value="{{ $category->name }}">

            @endforeach
        @endif
    </ul>
    <input type="text" id="category_input_box">
    <div class="btn close-btn">Close</div>
</div>