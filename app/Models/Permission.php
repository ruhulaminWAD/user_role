<?php

namespace App\Models;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded =['id'];

    // Relationship with roles
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('role_id');
    }

    // Relationship with Module
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

}
