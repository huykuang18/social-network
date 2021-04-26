<?php

namespace App\Http\Controllers;

use App\Repositories\Post\PostRepository;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost(Request $request)
    {
        $post = $this->postRepository->create([
            'user_id' => $request->user_id,
            'content' => $request->content,
            'share_id' => $request->share_id,
            'pricivy' => $request->pricivy
        ]);

        return $this->sendSuccess('Post created successfully',$post,200);
    }

    public function showPost($id)
    {
        $post = $this->postRepository->find($id);
        return $this->sendSuccess('Information',$post,200);
    }

    public function editPost($id,Request $request)
    {
        $post = $this->postRepository->update($id,[
            'user_id' => $request->user_id,
            'content' => $request->content,
            'share_id' => $request->share_id,
            'pricivy' => $request->pricivy
        ]);

        return $this->sendSuccess('Post updated successfully',$post,201);
    }

    public function deletePost($id)
    {
        $this->postRepository->delete($id);

        return $this->sendSuccess('Post number '.$id.' has deleted',[],200);
    }
}
