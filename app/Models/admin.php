<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;
    public $timestamps = false ;
    protected $table = 'admins';
    protected $fillable = [
      'users_id',
    ];
    public function user (){
        return $this->belongsTo(User::class);
    }
}
