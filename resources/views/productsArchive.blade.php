@extends('layout')

@section('content')
    <div style="width: 80%; margin:auto">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1 class="text-center m-5">Products | Archive</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->user->first_name ?? 'NA' }}</td>
                    <td>{{ $product->category->title ?? 'NA' }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td><img src="{{ asset($product->image) }}" alt="" width="200"></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
