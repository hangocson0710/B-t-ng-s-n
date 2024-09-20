<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public $timestamps = false;
    public function group(){
        return $this->belongsTo(Group::class,'group_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class,'created_by');
    }
}
