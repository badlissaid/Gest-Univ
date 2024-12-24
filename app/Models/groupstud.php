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
      'group_id',
      'student_id'
    ];
    public function groups()
    {
        return $this->belongsTo(group::class);
    }
    public function student()
    {
        return $this->hasOne(student::class);
    }
}
