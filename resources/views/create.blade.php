@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
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

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="mb-2">
                <div class="form-group">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="detail" class="form-label">Details:</label>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>
            <div class="mt-2">
                <div class="form-group">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" name="image" class="form-control" placeholder="image">
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary float-end">Submit</button>
            </div>


        </div>

    </form>
@endsection
