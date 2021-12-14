<!-- app/views/product/index.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- List Product Form... -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>List of Products</h4>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="product/add" role="button" class="btn btn-default">Add Product</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="dataTable">
                @if (count($products) > 0)

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Actions</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <!-- Name -->
                                <td class="table-text">
                                    <div>{{ $product->name }}</div>
                                </td>

                                <td>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            {!! Form::model($product, ['method' => 'GET', 'route' => ['editProduct',
                                                $product->id]]) !!}
                                            <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <div class="alert alert-info" role="alert">No products available</div>
                @endif
            </table>
        </div>
    </div>
@endsection
