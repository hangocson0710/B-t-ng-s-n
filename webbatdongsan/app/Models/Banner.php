<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table ='banner';
    public  $timestamps = false;
    public function admin(){
        return $this->belongsTo(Admin::class,'created_by');
    }
}
