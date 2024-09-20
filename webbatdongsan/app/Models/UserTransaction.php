<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;
    protected $table = 'user_transaction';
    public $timestamps = false;

    public function admin(){
        return $this->belongsTo(Admin::class,'confirm_by');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
