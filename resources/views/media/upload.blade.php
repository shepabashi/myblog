@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="panel">
            <h1 class="panel-heading">ファイルのアップロード</h1>
          <div class="panel-body">
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
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection