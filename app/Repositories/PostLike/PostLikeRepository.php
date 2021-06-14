<?php
namespace App\Repositories\PostLike;

use App\Models\PostLike;
use App\Repositories\BaseRepository;

class PostLikeRepository extends BaseRepository implements InterfacePostLikeRepository
{
    protected $postlike;
 
    public function __construct(PostLike $postlike)
    {
        $this->postlike = $postlike;
    }

    public function create($data = [])
    {
        return $this->postlike->create($data);
    }
 
    public function delete($id)
    {
        return $this->postlike->destroy($id);
    }
}