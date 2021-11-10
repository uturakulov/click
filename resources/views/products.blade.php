@extends('layout')

@section('content')
    <div style="width: 80%; margin:auto">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1 class="text-center m-5">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add</a>
        <a href="{{ route('admin-archive') }}" class="btn btn-secondary mb-3 ml-3">Archive</a>
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
                    <td>
                        <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                            class="btn btn-success">Edit</a>
                        <a href="{{ route('admin-delete', ['product' => $product->id]) }}"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $products->links() }}
    </div>
@endsection
