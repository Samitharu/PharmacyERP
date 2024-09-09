<?php

namespace Modules\MasterFiles\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "suppliers";
    protected $primaryKey  = "supplierId";

    protected $fillable = ["supplierName","address","contactNo","createdBy"];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
   
}
