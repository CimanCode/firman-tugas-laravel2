<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    protected $table = 'post';

    public function product(){
        return $this->belongsTo(product::class);
    }
}
