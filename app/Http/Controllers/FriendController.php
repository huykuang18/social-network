<?php

namespace App\Http\Controllers;

use App\Repositories\Friend\FriendRepository;
use Illuminate\Http\Request;

class FriendController extends Controller
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

        return response()->json([
            'status' => 200,
            'message' => "has sent an invitation",
            'data' => $friend
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $this->friendRepository->update($id,[
            'status' => $request->status
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Friend status has updated'
        ]);
    }

    public function unfriend($id)
    {
        $this->friendRepository->delete($id);

        return response()->json([
            'status' => 200,
            'message' => 'Unfriend successed'
        ]);
    }

    public function showFriendship($id)
    {
        $friend = $this->friendRepository->find($id);

        return response()->json([
            'friendship' => $friend
        ]);
    }
}
