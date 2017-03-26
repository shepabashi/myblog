@extends('config.layouts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <h1 class="panel-heading">新しい記事を追加</h1>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'post.store']) !!}

                        {!! Form::label('title', '記事のタイトル') !!}
                        {!! Form::text('title', old('title'), ['class'=>'form-control']) !!}

                        {!! Form::label('content_filtered', '記事の本文') !!}
                        {!! Form::textarea('content_filtered', old('content_filtered'), ['class'=>'form-control']) !!}

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
                </div>
            </div>
        </div>
    </div>

@endsection