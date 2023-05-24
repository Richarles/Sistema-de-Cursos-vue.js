<?php
namespace App\Services;

use App\Models\Curse;
use Illuminate\Support\Facades\Auth;

class CurseService
{
    public function listCurse($data){
        $search = $data['search'];
        if ( $search) {
            $list = Curse::where('name','like',$search.'%')->get()->toArray();
        }else{
            $list = Curse::get()->toArray();
        }
        
        return array_reverse($list);
    }

    public function createCurse($dataCurse){
        $data = [
            'name' => $dataCurse['name'],
            'price' => $dataCurse['price'],
            'description' => $dataCurse['description'],
            'field' => $dataCurse['field'],
            'user_id' => Auth::id()
        ];

        $saveCurse = Curse::create($data);

        return $saveCurse;
    }

    public function editCurse($id){
        $editCurse = Curse::find($id);

        return $editCurse;
    }

    public function updateCurse($dataCurse,$id){
        $data = [
            'name' => $dataCurse['name'],
            'price' => $dataCurse['price'],
            'description' => $dataCurse['description'],
            'field' => $dataCurse['field'],
            'user_id' => Auth::id()
        ];

        $updateCurse = Curse::find($id)->update($data);

        return $updateCurse;
    }

    public function deleteCurse($id){
        $deleteCurse = Curse::find($id)->delete();

        return $deleteCurse;
    }
}