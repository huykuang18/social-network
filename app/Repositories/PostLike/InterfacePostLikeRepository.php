<?php
namespace App\Repositories\PostLike;

use App\Repositories\InterfaceBaseRepository;

interface InterfacePostLikeRepository extends InterfaceBaseRepository
{
    public function create($data = []);
 
    public function delete($id);

}