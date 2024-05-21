<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\collection;
use Illuminate\Support\Facades\DB;

class UserRepository{

    public function get() : collection{
        //$district=USER::find(1)->district;
        //$user=USER::find(1);
        //$user->district=$district->dname;
        //dd($user);

        
        return User::select("*")
        ->join('districts', 'users.district_id', '=', 'districts.id')
        ->join('cities','districts.city_id','=','cities.id')
        ->where('users.id', '>', 0)
        ->get();
        

        //return User::orderby('id','desc')->get();
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
