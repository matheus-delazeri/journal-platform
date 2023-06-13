<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const STATE_DRAFT = "draft";
    const STATE_HIDDEN = "hidden";
    const STATE_PUBLISHED = "published";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author_id',
        'timeline_id',
        'state',
        'short_content',
        'content',
        'date',
        'image',
        'meta_description',
        'meta_keywords'
    ];

    public $timestamps = true;

    public static function states() : array
    {
        return [
            self::STATE_DRAFT => __(ucfirst(self::STATE_DRAFT)),
            self::STATE_HIDDEN => __(ucfirst(self::STATE_HIDDEN)),
            self::STATE_PUBLISHED => __(ucfirst(self::STATE_PUBLISHED))
        ];
    }
}
