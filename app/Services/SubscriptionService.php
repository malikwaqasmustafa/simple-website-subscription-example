<?php

namespace App\Services;

use App\Models\subscription;

class SubscriptionService
{
    public function isSubscriptionExists(int $websiteId, int $subscriber_id)
    {
        return Subscription::where([
            'website_id'    => $websiteId,
            'subscriber_id' => $subscriber_id
        ])->exists();
    }

    public function createSubscription(int $websiteId, int $subscriber_id)
    {
        return Subscription::create([
            "website_id" => $websiteId,
            "subscriber_id" => $subscriber_id
        ]);
    }
}
