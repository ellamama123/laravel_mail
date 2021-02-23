<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = ['candidate_id', 'template_id', 'position', 'datetime_interview', 'date_work', 'salary','content', 'candidate_email', 'status'];
}
