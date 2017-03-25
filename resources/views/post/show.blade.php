@extends('layouts.app')

@section('content')

    <h1 class="panel-heading">{{ $post->title }}</h1>
    <p><a href="{{ route('post.index') }}">戻る</a></p>
    <p><a href="{{ route('post.edit', $post) }}">編集</a></p>
    <p><a href="" onclick="if(confirm('削除?')){ document.forms['delete{{ $post->id }}'].submit(); }return false;">削除</a>
    </p>
    {!! Form::model($post, ['route' => ['post.destroy', $post], 'method'=>'delete', 'name'=>"delete$post->id"]) !!}{!! Form::close() !!}
    <p class="panel-body">{!! $post->content !!}</p>

@endsection