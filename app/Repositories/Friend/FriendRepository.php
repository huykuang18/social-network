<?php
namespace App\Repositories\Friend;

use App\Models\Friend;
use App\Repositories\BaseRepository;

class FriendRepository extends BaseRepository implements InterfaceFriendRepository
{
    protected $friend;
 
    public function __construct(Friend $friend)
    {
        $this->friend = $friend;
    }
 
    public function create($data = [])
    {
        return $this->friend->create($data);
    }
 
    public function update($id, $data = [])
    {
        $record = $this->friend->findOrFail($id);
 
        return $record->update($data);
    }
 
    public function delete($id)
    {
        return $this->friend->destroy($id);
    }
    
    public function find($id)
    {
        return $this->friend->findOrFail($id);
    }
}