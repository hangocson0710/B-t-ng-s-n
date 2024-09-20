<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassifiedCare extends Model
{
    use HasFactory;
    protected $table = 'classified_care';
    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function classified(){
        return $this->belongsTo(Classified::class,'classified_id');

    }
}
