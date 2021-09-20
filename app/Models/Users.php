<?php
namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table='users';
    protected $allowedFields=['firstname','lastname','email','password','updated_at'];
    protected $beforeInsert=['beforeInsert'];
    protected $beforeUpdate=['beforeUpdate'];

    /**
     * Password Hashing Logic
     * @param array $data
     * @return array
     */

    protected function beforeInsert(array $data){
        $data =$this->hashPassword($data);
        return $data;
    }
    protected function beforeUpdate(array $data){
        $data =$this->hashPassword($data);
        return $data;
    }
    public function hashPassword(array $data){
        if(isset($data['data']['password'])){
            $data['data']['password']=password_hash($data['data']['password'],PASSWORD_DEFAULT);
            return $data;

        }
    }
}