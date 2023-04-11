<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TellStory extends Model
{
    use HasFactory;
    //protected $guarded = ['id'];
    protected $fillable = [
        'storytitle',
        'storydescription',
        'whereithappened',
        'dateithappened',
        'images',
        'estimatedattendees',
        'addedby',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];
}
