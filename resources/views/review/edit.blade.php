<!-- app/views/review/edit.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- Edit Review Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Review: {!! $name !!}</h3>
                </div>
                <div class="panel-body">

                    <!-- if there are creation errors, they will show here -->
                    {!! HTML::ul($errors->all()) !!}

                    {!! Form::model($review, ['method' => 'PATCH', 'route' => ['updateReview', $review->id]]) !!}

                    <div class="form-group form-group-sm">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::text('description', $review->description, array('class' => 'form-control form-control-sm
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
                        {!! Form::text('user_name', $review->user_name, array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', $review->email, array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::Label('product_id', 'Product') !!}
                        <select class="form-control input-sm" name="product_id">
                            @foreach($products as $product)
                                @if($product['id'] == $pid)
                                    <option value="{{$product['id']}}" selected="{{$pid}}">{{$product['name']}}</option>
                                @else
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <a href="{!!URL::route('reviews')!!}" class="btn btn-sm btn-secondary" role="button">Cancel</a>
                    {!! Form::submit('Update', array('class' => 'btn btn-sm btn-info')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection