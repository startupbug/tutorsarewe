<?php 

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	public function getAllPermissions(){
		return $this->all();
	}

	public function getSinglePermission($id){
        return $this->where('id', $id)
                    ->first();		
	}

	public function storePermission($request){

	}

}