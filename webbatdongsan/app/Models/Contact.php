<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'classified_id',
        'phone',
    ];

    public function classified()
    {
        return $this->belongsTo(Classified::class);
    }
}
