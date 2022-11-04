@extends('backend.layout')

@section('content')
<form method="POST" action="{{ route('categories.update', ['id' => $category->id]) }}" class="mt-3" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama"
                name="harga" value="{{ $category->nama }} ">
                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </div>
</form>
@endsection


