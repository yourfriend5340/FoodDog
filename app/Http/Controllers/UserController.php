<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        
        $userService = new UserService();
        $user = $userService->get();
        return response()->json(['data'=>$user],200);
    }

    public function store(Request $request){
        $data=$request->all();
        $userService = new UserService();
        $user = $userService->store($data);
        return response()->json('success create data',200);
    }

    public function delete(Request $request,$id){
        $userService = new UserService();
        $user = $userService->delete($id);
        return response()->json('success delete data the ID is:'.$id.'',200);
    }

    public function update(Request $request,$id){
        $data=$request->all();
        $userService = new UserService();
        $user = $userService->update($id,$data);

        if ($user==0){
        return response()->json("data is not exit",200);}

        else{
            return response()->json("success update the NO. $id data",200);
        }
    }
}
