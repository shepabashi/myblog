@extends('layouts.app')

@section('content')
    <article>
        <h1 class="content-heading">{{ $post->title }}</h1>

        @if($post->categories)
            <ul class="categories">
                @foreach($post->categories as $category)
                    <li><a href="{{ route('category.show', $category) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        @endif
        <p class="panel-body">{!! $post->content !!}</p>
    </article>
@endsection