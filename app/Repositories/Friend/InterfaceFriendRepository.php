<?php
namespace App\Repositories\Friend;

use App\Repositories\InterfaceBaseRepository;

interface InterfaceFriendRepository extends InterfaceBaseRepository
{
    public function create($data = []);

    public function update($id, $data = []);
 
    public function delete($id);

    public function find($id);

}