<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    public $timestamps = false ;
    protected $table = 'students';
    protected $fillable = [
       'compétens',
       'spésific'
    ];
    public function user (){
        return $this->belongsTo(User::class);
    }
    public function groupstud()
    {
        return $this->belongsTo(groupstud::class);
    }
}
