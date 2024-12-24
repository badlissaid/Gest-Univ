<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitation extends Model
{
    /** @use HasFactory<\Database\Factories\InvitationFactory> */
    use HasFactory;
    use HasFactory;

    protected $fillable = ['students_id', 'projects_id', 'statut'];

    public function student ()
    {
        return $this->belongsTo(student::class);
    }

    public function project ()
    {
        return $this->belongsTo(project::class);
    }
}
