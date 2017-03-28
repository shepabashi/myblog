@extends('config.layouts')

@section('content')
    <div class="edit-area">
        {!! Form::model($post, ['route' => ['post.update', $post], 'method' =>'patch']) !!}

        {!! Form::label('title', '記事のタイトル') !!}
        {!! Form::text('title', $post->title, ['class'=>'form-control']) !!}

        {!! Form::label('content_filtered', '記事の本文') !!}
        {!! Form::textarea('content_filtered', $post->content_filtered, ['class'=>'form-control']) !!}

        {!! Form::label('slug') !!}
        {!! Form::text('slug', old('slug'), ['class'=>'form-control']) !!}

        @if(count($errors) > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::submit('投稿する', ['class'=>'btn btn-default']) !!}
        {!! Form::close() !!}
    </div>
@endsection