@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center">My Game List</h2>
            </div>
            <div class="float-end" style="margin-bottom:10px;">
                <a class="btn btn-success" href="{{ url('create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('delete'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('update'))
        <div class="alert alert-info">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered mt-2">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td align="center"><img src="/images/{{ $product->image }}" width="100px"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td align="center">
                    <form action="{{ route('destroy', $product->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('show', $product->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('edit', $product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    @if (count($products) === 0)
        <div class="alert alert-danger p-2 text-center">
            No record found please create one!
        </div>
    @endif

    {!! $products->links() !!}
@endsection
