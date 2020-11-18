<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class orderModel extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    
    protected $table = 'orders';
    protected $primaryKey = 'id_order';
    public $timestamps = false;

    public function user(){
        return $this->hasOne('user::class');
    }

    public function paket(){
        return $this->belongsTo('paket::class');
    }

    public function psikolog(){
        return $this->belongsTo('psikolog::class');
    }
 
}
