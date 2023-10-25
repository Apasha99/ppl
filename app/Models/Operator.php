<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Operator extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'email',
        'fotoProfil',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
