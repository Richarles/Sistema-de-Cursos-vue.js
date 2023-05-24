<?php
namespace App\Services;

use App\Models\candidate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function listUser($data){
        $search = $data['search'];
        if ($search) {
            $list = User::where('type',$search)->get()->toArray();
        }else{
            $list = User::get()->toArray();
        }

        return $list;
    }

    public function createUser($data){
        $data = [
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'state' => $data['state'],
            'city' => $data['city'],
            'road' => $data['road'],
            'district' => $data['district'],
            'number' => $data['number'],
            'date_birth' => $data['date_birth'],
            'fone' => $data['fone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type']
        ];

        $user = User::create($data);

        return $user;
    }

    public function editUser($id){
        $editUser = User::find($id);

        return $editUser;
    }

    public function updateUser($data,$id){
        $data = [
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'state' => $data['state'],
            'city' => $data['city'],
            'road' => $data['road'],
            'district' => $data['district'],
            'number' => $data['number'],
            'date_birth' => $data['date_birth'],
            'fone' => $data['fone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type']
        ];

        $user = User::find($id)->update($data);

        return $user;
    }

    public function deleteUser($id){
        $user = User::find($id)->delete();

        return $user;
    }
}