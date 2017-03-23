@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel">
                    <h1 class="panel-heading">メディア一覧</h1>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>upload date</th>
                                <th>image</th>
                            </tr>
                        @forelse($media as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->file_name }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td><a href="{{ asset('storage/' . $item->path) }}" target="_blank"><img src="{{ asset('storage/' . $item->path) }}" alt="" height="50"></a></td>
                            </tr>
                        @empty
                            アップロードがありません。
                        @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection