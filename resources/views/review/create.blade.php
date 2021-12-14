<!-- app/views/review/create.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Create Review Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create New Review</h3>
                </div>
                <div class="panel-body">

                    <!-- if there are creation errors, they will show here -->
                    {!! HTML::ul($errors->all()) !!}

                    {!! Form::open(array('route' => 'storeReview', 'method'=>'POST','files'=>true)) !!}

                    <div class="form-group form-group-sm">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::text('description', Request::old('description'), array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('rating', 'Rating (Poor = 1, Not Bad = 2, Good = 3, Best = 4 & Exceptional = 5)') !!}
                        {!! Form::select('rating', array('' => 'Select a rating', '1'=>'Poor', '2'=>'Not Bad',
                        '3'=>'Good', '4'=>'Best', '5'=>'Exceptional'), null, array('class' => 'form-control input-sm
                        form-control-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('user_name', 'User Name') !!}
                        {!! Form::text('user_name', $user->name, array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', $user->email, array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::Label('product_id', 'Product') !!}
                        <select class="form-control input-sm form-control-sm" name="product_id" id="product_id">
                            <option value="">Products</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}" @if(old('product_id')==$product->id)
                                selected="selected"@endif>{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <a href="{!!URL::route('reviews')!!}" class="btn btn-sm btn-secondary" role="button">Cancel</a>
                    {!! Form::submit('Create', array('class' => 'btn btn-sm btn-info')) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection