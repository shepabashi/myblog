@extends('layouts.app')

@section('content')
    @forelse($posts as $post)
        <article>
            <h1 class="content-heading"><a href="{{ route('post.show', $post) }}">{{ $post->title }}</a></h1>

            <p class="panel-body">{!! removeMarkup($post->content, null, 100) !!}</p>

            <p><a href="{{ route('post.show', $post) }}" class="btn">続きを読む</a></p>

        </article>
    @empty
        <div class="panel">
            <h1 class="panel-heading">No Entry</h1>
            <p class="panel-body">This blog has no entry.</p>
        </div>
    @endforelse
@endsection