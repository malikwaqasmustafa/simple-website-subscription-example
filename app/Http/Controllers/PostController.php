<?php

namespace App\Http\Controllers;

use App\Constants\PostConstants;
use App\Events\NewPostCreated;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Http\Traits\HttpResponses;
use App\Models\Post;
use App\Models\Website;

class PostController extends Controller
{
    use HttpResponses;

    public function posts(Website $website)
    {
        $posts = $website->posts()->paginate();
        return PostResource::collection($posts);
    }

    public function storePost(PostRequest $postRequest) {
        $post = $postRequest->validated();

        $createPost = Post::create([
           "website_id" => $post['website_id'],
           "title" => $post['title'],
           "description" => $post['description']
        ]);

        if ($createPost){
            /**
             * Dispatching the event from here it will trigger the notification
             * for the user who subscribed these posts
             */
            event(new NewPostCreated($post['website_id'], $createPost));
            return $this->success($createPost, PostConstants::POST_CREATED);
        }

        return $this->error([], PostConstants::POST_FAILED);
    }
}
