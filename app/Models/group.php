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
    public function groupstud()
    {
        return $this->belongsTo(groupstud::class);
    }
}
