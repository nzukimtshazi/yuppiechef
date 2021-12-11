<!-- app/views/product/add.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Add Product Form... -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mb-3">Add New Product</h4>

                        <div class="col-md-8">

                            <!-- if there are creation errors, they will show here -->
                            {!! HTML::ul($errors->all()) !!}

                            {!! Form::open(array('route' => 'storeProduct', 'method'=>'POST','files'=>true)) !!}

                            <div class="form-group form-group-sm">
                                {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', Request::old('name'), array('class' => 'form-control form-control-sm
                                input-sm', 'required')) !!}
                            </div>

                            <a href="{!!URL::route('products')!!}" class="btn btn-sm btn-secondary" role="button">Cancel</a>
                            {!! Form::submit('Add', array('class' => 'btn btn-sm btn-info')) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection