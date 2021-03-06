<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class PaketModel extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    
    protected $table = 'pakets';
    protected $primaryKey = 'id_paket';
    public $timestamps = false;

    public function users(){
        return $this->belongsTo('user::class');
    }

    public function orders(){
        return $this->belongsTo('orders::class');
    }

    public function psikologs(){
        return $this->belongsTo('psikologs::class');
    }
 
}
