<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Branch;

class FetchController extends Controller
{
    public function fetch($id)
    {
        $branch = Branch::find($id);
        $d =   \GoogleMaps::load('nearbysearch')

                 ->setParam([
                     'location'  => $branch->latitude . ', ' . $branch->longitude,
                     'radius'    => '25000',
                     'name'      => 'service hp',

                 ])
                 ->get();

        dd(json_decode($d));
    }
}
