<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['role_name', 'permission'];
    public function admin()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }
}
