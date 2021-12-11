<!-- app/views/review/index.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- List Review Form... -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>Product Reviews</h4>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="review/create" role="button" class="btn btn-default">Create Review</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="dataTable">
            @if (count($reviews) > 0)

                <!-- Table Headings -->
                    <thead>
                    <th>Description</th>
                    <th>Rating</th>
                    <th>Product</th>
                    <th>User name</th>
                    <th>Email</th>
                    <th>Actions</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <!-- Description -->
                            <td class="table-text">
                                <div>{{ $review->description }}</div>
                            </td>

                            <!-- Rating -->
                            <td class="table-text">
                                <div>{{ $review->rating }}</div>
                            </td>

                            <!-- Product -->
                            <td class="table-text">
                                <div>{{ $review->product }}</div>
                            </td>

                            <!-- User Name -->
                            <td class="table-text">
                                <div>{{ $review->user_named }}</div>
                            </td>

                            <!-- Email -->
                            <td class="table-text">
                                <div>{{ $review->email }}</div>
                            </td>

                            <td>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        {!! Form::model($review, ['method' => 'GET', 'route' => ['editReview',
                                            $review->id]]) !!}
                                        <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <div class="alert alert-info" role="alert">No reviews available</div>
                @endif
            </table>
        </div>
    </div>
@endsection
