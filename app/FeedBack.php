<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class FeedBack extends Model
{
    protected $table = 'feed_backs';
    protected $fillable = [
        'name',
        'phone',
        'message'
    ];
}
