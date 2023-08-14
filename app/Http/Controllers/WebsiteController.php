<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebsiteRequest;
use App\Http\Resources\WebsiteResource;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WebsiteController extends Controller
{
    public function __invoke(WebsiteRequest $website)
    {
        // Using caching for website's won't be expected to be added so fast in the system
        // You can adjust the minutes of caching depending on the real world case and requirement
        $cacheObject = "endpoint_website";
        $websites = Cache::remember($cacheObject, now()->addMinutes(60), static function () {
            return Website::all();
        });

        return WebsiteResource::collection($websites);
    }
}
