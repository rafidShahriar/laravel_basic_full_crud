@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('productCRUD.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name}}</td>
        <td>{{ $product->details}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('productCRUD.show',$product->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('productCRUD.edit', $product->id) }}">Edit</a>
            <form action="{{ route('productCRUD.destroy',$product->id) }}" method="POST" display="inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash"></i> Delete
            </button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    {!! $products->render() !!}
@endsection