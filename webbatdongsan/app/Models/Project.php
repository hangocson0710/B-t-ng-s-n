<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';
    public $timestamps = false;

    public function group(){
        return $this->belongsTo(Group::class,'group_id');
    }
    public function classifieds()
{
    return $this->hasMany(Classified::class);
}
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function area(){
        return $this->belongsTo(Unit::class,'area_type');
    }
    public function price(){
        return $this->belongsTo(Unit::class,'price_type');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function district()
{
    return $this->belongsTo(District::class, 'district_id');
}
public function ward()
{
    return $this->belongsTo(Ward::class, 'ward_id');
}
}
