<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }


}
