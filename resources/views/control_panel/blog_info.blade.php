@extends('control_panel.layouts')

@section('content')
    <h2>ブログの情報</h2>
    {!! Form::open() !!}

    {!! Form::label('blog_name', 'ブログ名') !!}
    {!! Form::text('blog_name', option('blog_name')) !!}

    {!! Form::submit('保存', ['class' => 'btn']) !!}

    {!! Form::close() !!}
@endsection