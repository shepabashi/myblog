@if(auth()->check())
<div id="control-bar">
    ようこそ！ {{ auth()->user()->user_login }} さん。
</div>
@endif