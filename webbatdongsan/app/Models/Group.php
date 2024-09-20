<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = 'group';
    public $timestamps = false;

    public function group_child(){
      return $this->hasMany(Group::class,'parent_id',);
    }
    public function group_classified(){
        return $this->hasMany(Classified::class,'group_id');
    }
    public function group_project(){
        return $this->hasMany(Project::class,'group_id');
    }
    public function group_news(){
        return $this->hasMany(News::class,'group_id');
    }
}
