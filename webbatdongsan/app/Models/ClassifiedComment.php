<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassifiedComment extends Model
{
    use HasFactory;
    protected $table = 'classified_comment';
    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
