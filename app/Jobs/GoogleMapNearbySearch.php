<?php

namespace App\Jobs;

use App\Models\Store;
use GoogleMaps\Facade\GoogleMapsFacade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleMapNearbySearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The array data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $next_page_token = null;

        do {
            $scrapes = json_decode(GoogleMapsFacade::load('nearbysearch')->setParam([
                'location'  => $this->data['lat'] . ', ' . $this->data['lng'],
                'radius'    => $this->data['radius'],
                'keyword'   => $this->data['keyword'],
                'pagetoken' => $next_page_token,
            ])->get());

            $next_page_token = $scrapes->next_page_token ? $scrapes->next_page_token : null;

            foreach($scrapes->results as $store) {
                $lat = $store->geometry->location->lat;
                $lng = $store->geometry->location->lng;

                $data = [
                    'branch_id' => $this->data['branch_id'],
                    'place_id' => $store->place_id,
                    'name' => $store->name,
                    'latitude' => $lat,
                    'longitude' => $lng,
                    'address' => $store->vicinity,
                    'map' => "https://www.google.com/maps/search/?api=1&query={$lat},{$lng}",
                ];

                ScrapesStore::dispatch($data);
            };
        } while($next_page_token);
    }
}
