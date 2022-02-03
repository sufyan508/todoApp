<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{
    protected $table = 'tasks';
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'label',
        'color',
        'icon',
        'due_date',
        'description',
        'order',
        'status',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tasks/'.$this->getKey());
    }
}
