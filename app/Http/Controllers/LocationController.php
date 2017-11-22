<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getRegionsList(Request $request)
    {
        if ($countryId = $request->depdrop_all_params['country']) {
            $regions = Country::find($countryId)->regions;

            $regionsList = $regions->map(function ($item, $key) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name']
                ];
            });


            return response()->json(['output' => $regionsList]);
        }
        return;
    }

    public function getCitiesList(Request $request)
    {
        if ($regionId = $request->depdrop_all_params['region']) {
            $cities = Region::find($regionId)->cities;

            $citiesList = $cities->map(function ($item, $key) {
                return [
                    'id' => $item['id'],
                    'name' => $item['name']
                ];
            });

            return response()->json(['output' => $citiesList]);
        }
        return;
    }
}
