@extends('control_panel.layouts')

@section('content')
    <h1>ファイルのアップロード</h1>
    {!! Form::open(['files' => true]) !!}

    {!! Form::label('file_name', 'ファイル名') !!}
    {!! Form::text('file_name', old('title'), ['class'=>'form-control']) !!}

    {!! Form::label('alt', 'ファイルの説明') !!}
    {!! Form::text('alt', old('description'), ['class'=>'form-control']) !!}

    {!! Form::label('media', 'ファイルの選択') !!}
    {!! Form::file('media', ['class'=>'form-control']) !!}
    <br>

    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::submit('ファイルをアップロード', ['class'=>'btn btn-default']) !!}

    {!! Form::close() !!}

@endsection