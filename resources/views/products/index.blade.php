@extends('backend.layout')

@section('content')
        <div class="row mt-2"></div>
      <div class="col-sm-12 col-md-8">
      </div>
      <div class="col-sm-12-col-md-4">
        <a href="{{ route('products.create') }}" class="btn btn-dark float-end">Add Product </a>
        <h2>List products</h2>
      </div>
        <table class="table">
            <thead class="bg-dark text-white">
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">Gambar</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Discount</th>
                <th scope="col">Category</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Tanggal Diperbaharui</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                <th scope="row">{{ $product ->nama }}</th>
                <td>
                <img src="{{ asset ('uploads/' . $product->gambar) }}" alt="" class="img-thumbnail" width="100">
                </td>
                <td>{{ $product->harga }}</td>
                <td>{{ $product->deskripsi }}</td>
                <td>{{ $product->discount }}</td>
                <td>{{ $product->category ? $product->category->nama : 'kategori tidak ada' }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">hapus</button>
                    <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-info">Edit</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
         @endsection

