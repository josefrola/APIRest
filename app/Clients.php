<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
   
    protected $table="Clients";
    protected $fillable=['id','rut','name','lastName','phone','mobile','address'];
    
    public function getListRutCliets($rut){
        $result=\DB::table('Clients')->where('rut','=',$rut)->select('id','rut','name','lastName','phone','mobile','address')->get();
        return $result;
    }
}
