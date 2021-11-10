@extends('layout')

@section('content')
    <div style="width: 50%; margin:auto">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1 class="text-center m-5">Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add</a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Title</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                            class="btn btn-success">Edit</a>
                        <a href="{{ route('admin-delete-category', ['category' => $category->id]) }}"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $categories->links() }}
    </div>
@endsection
