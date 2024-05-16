<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\collection;

class UserRepository{

    public function get() : collection{
        return User::orderby('id','desc')->get();
    }

    public function store($data) {
        return User::create($data);
    }

    public function delete($id){
        return User::where('id','=',$id)->delete();
    }

    public function update($id,$data){
        return User::where('id','=',$id)->update($data);
    }
}
