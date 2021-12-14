<!-- app/views/report/stats.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- Create Totals Per Product name Form... -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>Total Reviews Per Product</h4>
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
                    <th>Total</th>
                </thead>

                <!-- Table Body -->
                <tbody>

                    <?php
                        $count = 0;
                    ?>

                    @foreach ($reviews as $review)
                        <tr>
                            <!-- Product Name -->
                            <td class="table-text">
                                <div>{{ $review->name }}</div>
                            </td>

                            <!-- Total -->
                            <td class="table-text">
                                <div>{{ $review->total }}</div>
                            </td>
                        </tr>

                        <?php
                            $count = $count + $review->total;
                        ?>
                    @endforeach
                    <tfoot></tfoot>
                    <tfoot>
                        <th>Grand Total</th>
                        <th>{{ number_format($count) }}</th>
                    </tfoot>
                </tbody>
            </table>
        </div>
    </div>
@endsection
