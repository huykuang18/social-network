<?php

namespace App\Http\Controllers;

use App\Repositories\PostLike\PostLikeRepository;
use Illuminate\Http\Request;

class PostLikeController extends BaseController
{
    protected $postLikeRepository;
    
    public function __construct(PostLikeRepository $postLikeRepository)
    {
        $this->postLikeRepository = $postLikeRepository;
    }

    public function like(Request $request)
    {
        $like = $this->postLikeRepository->create([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id
        ]);

        return $this->sendSuccess('You liked this post',$like,200);
    }

    public function dislike($id)
    {
        $this->postLikeRepository->delete($id);

        return $this->sendSuccess('Dislike this post',[],200);
    }
}
