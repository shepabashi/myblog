@extends('control_panel.layouts')

@section('content')

    <h1>記事一覧</h1>
    @if($posts)
        <table>
            <tr>
                <th colspan="2">#</th>
                <th>タイトル</th>
                <th>スラッグ</th>
                <th>作成日</th>
                <th>更新日</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>
                    <a href="{{ route('post.show', $post) }}" class="btn">表示</a>
                    <a href="{{ route('post.edit', $post) }}" class="btn">編集</a>
                    <a href="" class="btn" onclick="if(confirm('Do you wanna delete this post?')){document.forms['delete{{ $post->id }}'].submit()} return false;">削除</a>
                    {!! Form::open(['route'=> ['post.destroy', $post], 'method'=>'delete', 'name'=>"delete$post->id"]) !!}{!! Form::close() !!}
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
            </tr>
            @endforeach
        </table>
    @else
        記事が投稿されていません。
    @endif
@endsection