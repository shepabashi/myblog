@if(auth()->check())
    <div id="admin-bar">
        <div class="pull-left">
            ようこそ！ {{ auth()->user()->user_login }} さん。
            <a href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i> ホーム</a>
            @if(request()->route()->getName() === 'post.show')
                <a href="{{ route('post.edit', $post) }}"><i class="fa fa-pencil" aria-hidden="true"></i> 編集</a>
                <a href="#" onclick="document.forms['delete'].submit(); return false;"><i class="fa fa-trash-o"
                                                                                          aria-hidden="true"></i> 削除</a>
                {!! Form::open(['route'=> ['post.destroy', $post], 'method'=>'delete', 'name'=>'delete']) !!}{!! Form::close() !!}
            @endif
        </div>
        <div class="pull-right">
            <a href="{{ route('post.create') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i> 記事作成</a>
            <a href="{{ route('control-panel.root') }}"><i class="fa fa-cog" aria-hidden="true"></i> 管理</a>
            <a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> ログアウト</a>
        </div>
    </div>
@endif