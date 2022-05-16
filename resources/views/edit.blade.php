@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="mb-2">
                <div class="form-group">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                </div>
            </div>
            <div class="mb-2">
                <div class="form-group">
                    <label for="detail" class="form-label">Details:</label>

                    <textarea class="form-control" style="height:150px" name="detail"
                        placeholder="Detail">{{ $product->detail }}</textarea>
                </div>
            </div>
            <div class="mt-2">
                <div class="form-group">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img class="mt-2" src="/images/{{ $product->image }}" width="150px">
                    <button type="submit" class="btn btn-primary float-end mt-3">Submit</button>

                </div>
            </div>

        </div>

    </form>
@endsection
