<?php
namespace App\Models;

use CodeIgniter\Model;

class  Articles extends Model{
    protected $table='articals';
    protected $allowedFields=['title','body','user_id'];

    public function getArticales(){
        return $this->findAll();
    }

    public function getPaginatin(){
        $data=[
            'articles'=>$this->paginate(2),
            'pager'=>$this->pager,
        ];
    return $data;
    }

}
