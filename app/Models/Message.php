<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Message extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'username',
        'email',
        'url',
        'message',
        'ip',
        'browser_info'
    ];

    protected $attributes = [
        'url' => null,
    ];

    public $sortable = ['username', 'created_at'];
}
