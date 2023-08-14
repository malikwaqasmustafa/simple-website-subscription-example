<?php

namespace App\Http\Controllers;

use App\Constants\SubscriberConstants;
use App\Http\Requests\SubscribeRequest;
use App\Http\Traits\HttpResponses;
use App\Models\subscriber;
use App\Models\Website;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubscriptionController extends Controller
{
    /**
     * I will be using this trait as my central template to return uniform responses
     * in all of my endpoints for consistency
     */

    use HttpResponses;

    /**
     * Modern syntax for constructor property promotion
     * @param  SubscriptionService  $subscriptionService
     */
    public function __construct(private SubscriptionService $subscriptionService)
    {
    }

    public function save(SubscribeRequest $subscribeRequest) {
        $input = $subscribeRequest->validated();

        // Creating the subscriber if it doesn't exist already
        $subscriber = Subscriber::firstOrCreate(['email' => $input['email']]);
        $website = Website::findOrFail($input['website_id']);

        if ($this->subscriptionService->isSubscriptionExists($website->id, $subscriber->id)) {
            return $this->error([], SubscriberConstants::USER_DUPLICATED);
        }

        $this->subscriptionService->createSubscription($website->id, $subscriber->id);

        return $this->success([], SubscriberConstants::USER_SUBSCRIBED);
    }
}
