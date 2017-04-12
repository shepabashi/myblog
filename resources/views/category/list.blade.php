@extends('control_panel.layouts')

@section('content')
    <div class="category-edit">
        <h1>カテゴリ一覧</h1>
        @if($categories)
            <table>
                <tr>
                    <th colspan="2">#</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                </tr>
                @foreach($categories as $category)
                    <tr data="{{ $category->slug }}">
                        <td>{{ $category->id }}</td>
                        <td class="edit-item">
                            <a href="{{ route('category.show', $category) }}" class="btn">一覧</a>
                            <a href="#" class="btn">編集</a>
                            <a href="#" class="btn"
                               onclick="if(confirm('Do you wanna delete this category?')){document.forms['delete{{ $category->id }}'].submit()} return false;">削除</a>
                            {!! Form::open(['route'=> ['category.destroy', $category], 'method'=>'delete', 'name'=>"delete$category->id"]) !!}{!! Form::close() !!}
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug ?: '--' }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            記事が投稿されていません。
        @endif
    </div>
@endsection