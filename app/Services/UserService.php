<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserService{

    public function get() : collection{
        $userRepository = new UserRepository;
        return $userRepository->get();
    }

    public function store($data) {
        $userRepository = new UserRepository;
        $data['password']=hash::make($data['password']);
        return $userRepository->store($data);
    }

    public function delete($id){
        $userRepository = new UserRepository;
        return $userRepository->delete($id);
    }

    public function update($id,$data){
        $userRepository = new UserRepository;
        return $userRepository->update($id,$data);
    }
}