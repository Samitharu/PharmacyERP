<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "roles";
    protected $primaryKey  = "roleId";
    protected $fillable = [];
    
    public function users()
    {
        return $this->hasMany(User::class, 'roleId');
    }
    
}
