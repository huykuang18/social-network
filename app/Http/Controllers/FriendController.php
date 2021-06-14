<?php

namespace App\Http\Controllers;

use App\Repositories\Friend\FriendRepository;
use Illuminate\Http\Request;

class FriendController extends BaseController
{
    protected $friendRepository;

    public function __construct(FriendRepository $friendRepository)
    {
        $this->friendRepository = $friendRepository;
    }

    public function addFriend(Request $request)
    {
        $friend = $this->friendRepository->create([
            'user_id' => $request->user_id,
            'friend_id' => $request->friend_id,
        ]);

        return $this->sendSuccess('has sent an invitation',$friend,200);
    }

    public function updateStatus(Request $request, $id)
    {
        $this->friendRepository->update($id,[
            'status' => $request->status
        ]);
        
        return $this->sendSuccess('Friend status has updated',[],201);
    }

    public function unfriend($id)
    {
        $this->friendRepository->delete($id);

        return $this->sendSuccess('Unfriend successfully',[],200);
    }

    public function showFriendship($id)
    {
        $friend = $this->friendRepository->find($id);

        return $this->sendSuccess('Friendship',$friend,200);
    }
}
