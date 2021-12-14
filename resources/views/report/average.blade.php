<!-- app/views/report/average.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- Create Average Per Product name Form... -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>Average Rating Per Product</h4>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="{!!URL::route('reviews')!!}" role="button" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="DataTable">
                <!-- Table Headings -->
                <thead>
                <th>Product Name</th>
                <th>Average</th>
                </thead>

                <!-- Table Body -->
                <tbody>

                    @foreach ($reviews as $review)
                        <tr>
                            <!-- Product Name -->
                            <td class="table-text">
                                <div>{{ $review->name }}</div>
                            </td>

                            <!-- Average -->
                            <td class="table-text">
                                <div>{{ number_format($review->average, 2) }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
