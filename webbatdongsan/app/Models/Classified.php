<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classified extends Model
{
    use HasFactory;
    protected $table = 'classified';
    public $timestamps = false;
    public function group(){
        return $this->belongsTo(Group::class,'group_id');
    } public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function area(){
        return $this->belongsTo(Unit::class,'area_type');
    }
    public function price(){
        return $this->belongsTo(Unit::class,'price_type');
    }public function bed(){
        return $this->belongsTo(ClassifiedParam::class,'num_bed');
    }public function toilet(){
        return $this->belongsTo(ClassifiedParam::class,'num_toi');
    }
    public function comment(){
        return $this->hasMany(ClassifiedComment::class,'classified_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

public function district()
{
    return $this->belongsTo(District::class, 'district_id');
}

public function province()
{
    return $this->belongsTo(Province::class, 'province_id');
}
public function priceType()
    {
        return $this->belongsTo(Unit::class, 'price_type');
    }
    public function areaType()
    {
        return $this->belongsTo(Unit::class, 'area_type');
    }

  
}
