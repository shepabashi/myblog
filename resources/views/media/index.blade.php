@extends('control_panel.layouts')

@section('content')
    <h1>メディア一覧</h1>

    @if($media->isNotEmpty())
        <table class="table">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>upload date</th>
                <th>image</th>
            </tr>
            @foreach($media as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->file_name }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td><a href="{{ asset('storage/' . $item->path) }}" target="_blank"><img src="{{ asset('storage/' . $item->path) }}" alt="" height="50"></a></td>
                </tr>
            @endforeach
        </table>
    @else
        アップロードがありません。
    @endif
@endsection