<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stats()
    {
        $sql = "select name, count(product_id) as total from products p, reviews r where  p.id > 0 and p.id = r.product_id
                    group by name order by name asc";
        $reviews = DB::select($sql);

        return view('report.stats', compact('reviews'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function average()
    {
        $sql = "select name, avg(rating) as average from products p, reviews r where  p.id > 0 and p.id = r.product_id
                    group by name order by name asc";
        $reviews = DB::select($sql);

        return view('report.average', compact('reviews'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ratings()
    {
        $sql = "select rating, count(rating) as total from reviews where  id > 0 group by rating order by rating asc";
        $reviews = DB::select($sql);

        return view('report.rating', compact('reviews'));
    }
}
