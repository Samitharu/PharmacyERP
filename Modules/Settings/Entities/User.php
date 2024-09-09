<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [];
    

    public function role()
{
    return $this->belongsTo(Role::class, 'roleId');
}
    
}
