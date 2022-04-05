<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stena extends Model
{
    use HasFactory;

    protected $fillable = ['text','user_id','theme'];

    protected $table = 'stena';
    public function stena(){
        return $this->hasMany(Users::class);
    }
}
