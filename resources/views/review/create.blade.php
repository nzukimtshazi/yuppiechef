<!-- app/views/review/create.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Add Review Form... -->

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mr-5 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mb-3">Add New Review</h4>

                        <div class="col-md-8">

                            <!-- if there are creation errors, they will show here -->
                            {!! HTML::ul($errors->all()) !!}

                            {!! Form::open(array('route' => 'storeReview', 'method'=>'POST','files'=>true)) !!}

                            <div class="form-group form-group-sm">
                                {!! Form::label('description', 'Description:') !!}
                                {!! Form::text('description', Request::old('description'), array('class' => 'form-control form-control-sm
                                input-sm', 'required')) !!}
                            </div>

                            <a href="{!!URL::route('reviews')!!}" class="btn btn-sm btn-secondary" role="button">Cancel</a>
                            {!! Form::submit('Create', array('class' => 'btn btn-sm btn-info')) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection