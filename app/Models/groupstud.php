<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupstud extends Model
{
    /** @use HasFactory<\Database\Factories\GroupstudFactory> */
    use HasFactory;

    public $timestamps = false ;
    protected $table = 'groupstuds' ;
    protected $fillable =[
      'groups_id',
      'stud_id'
    ];
    public function groups()
    {
        return $this->hasOne(group::class);
    }
    public function student()
    {
        return $this->hasMany(student::class);
    }
}
