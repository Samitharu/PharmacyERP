<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\MasterFiles\Entities\Supplier;

class User extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "users";
    protected $primaryKey  = "userId";

    protected $fillable = ["userName","password","email","roleId"];
   

    public function role()
{
    return $this->belongsTo(Role::class, 'roleId');
}

public function suppliers()
    {
        return $this->hasMany(Supplier::class, 'createdBy');
    }
    
}
