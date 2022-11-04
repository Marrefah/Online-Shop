@extends('backend.layout')

@section('content')
        <div class="row mt-2"></div>
      <div class="col-sm-12 col-md-8">
      </div>
      <div class="col-sm-12-col-md-4">
        <a href="{{ route('categories.create') }}" class="btn btn-dark float-end">Add Category </a>
        <h2>List categories</h2>
      </div>
        <table class="table">
            <thead class="bg-dark text-white">
              <tr>
                <th class="col-sm-10 col-md-5" scope="col">Nama </th>
                <th class="col-sm-10 col-md-5" scope="col">Gambar </th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category ->nama }}</th>
                    <td>
                        <img src="{{ asset('uploads/' . $category->gambar ) }}" alt="igm-thumbnail"width="100">
                    </td>
                    <td>
                    <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">hapus</button>
                        <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-info">Edit</a>
                        </form>
                    </td>
                </tr>
                @endforeach
    </tbody>
</table>
         @endsection

