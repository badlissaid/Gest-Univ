<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;
    public $timestamps = false ;
    protected $table = 'groups';
    protected $fillable = [

    ];
    public function groupstud()
    {
        return $this->hasMany(groupstud::class);
    }
    public function project()
    {
        return $this->hasOne(project::class);
    }
}
