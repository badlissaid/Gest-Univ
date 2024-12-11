<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class techer extends Model
{
    /** @use HasFactory<\Database\Factories\TecherFactory> */
    use HasFactory;
    public $timestamps = false ;
    protected $table = 'techers';
    protected $fillable = [
        'users_id',
    ];
    public function user (){
        return $this->belongsTo(User::class);
    }
}
