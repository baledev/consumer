<?php

namespace App\Http\Controllers;

use App\Jobs\GoogleMapNearbySearch;
use App\Jobs\ScrapesStore;
use Illuminate\Http\Request;
use App\Models\Branch;
use GoogleMaps\Facade\GoogleMapsFacade;
use Illuminate\Support\Facades\Redirect;

class FetchController extends Controller
{
    public function fetch($id)
    {
        $branch = Branch::find($id);

        // $scrapes = json_decode(GoogleMapsFacade::load('nearbysearch')->setParam([
        //     'location'  => $branch->latitude . ', ' . $branch->longitude,
        //     'radius'    => '25000',
        //     'keyword'   => 'service hp',
        // ])->get());

        // dd($scrapes->next_page_token);

        // $next_page_token = $scrapes->next_page_token;


        GoogleMapNearbySearch::dispatch([
            'branch_id' => $branch->id,
            'lat' => $branch->latitude,
            'lng' => $branch->longitude,
            'radius' => '25000',
            'keyword' => 'service hp',
        ]);

        return Redirect::back();
    }
}
