@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">




                @forelse($posts as $post)
                    <div class="panel">
                        <h1 class="panel-heading">{{ $post->title }}</h1>
                        <p><a href="{{ route('post.show', $post) }}">表示</a></p>
                        <p><a href="{{ route('post.edit', $post) }}">編集</a></p>
                        <p><a href="" onclick="if(confirm('削除?')){ document.forms['delete{{ $post->id }}'].submit(); }return false;">削除</a></p>
                        {!! Form::model($post, ['route' => ['post.destroy', $post], 'method'=>'delete', 'name'=>"delete$post->id"]) !!}{!! Form::close() !!}
                        <p class="panel-body">{{ $post->content }}</p>
                    </div>
                @empty
                    <div class="panel">
                        <h1 class="panel-heading">No Entry</h1>
                        <p class="panel-body">This blog has no entry.</p>
                    </div>
                @endforelse


            </div>
        </div>
    </div>

@endsection