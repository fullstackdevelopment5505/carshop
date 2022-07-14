<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use DB;

class CarController extends Controller
{
    public function index(){
        $cars = Car::latest()->paginate(10);
        return view('welcome', compact('cars'));
    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $sort_by = $request->get('sortby');
            $filter_by = $request->get('filterby');
            $sort_by = !$sort_by ? 'make' : $sort_by;
            $cars = DB::table('cars')
                ->where('seller', 'like', '%'.$filter_by.'%')
                ->orderBy($sort_by, 'ASC')
                ->paginate(10);
            return view('welcome_pagination', compact('cars'))->render();
        }
    }
}
