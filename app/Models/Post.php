<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'url_key',
        'meta_description',
        'meta_keywords'
    ];

    public $timestamps = true;

    public function save(array $options = [])
    {
        $this->setUrlKey();
        return parent::save($options);
    }

    public function getAuthorAttribute()
    {
        $author = User::find($this->author_id);

        return $author->user;
    }

    protected function setUrlKey()
    {
        if (!$this->url_key) {
            $this->url_key = Str::slug($this->title);
        }
    }

    public static function states(): array
    {
        return [
            self::STATE_DRAFT => __(ucfirst(self::STATE_DRAFT)),
            self::STATE_HIDDEN => __(ucfirst(self::STATE_HIDDEN)),
            self::STATE_PUBLISHED => __(ucfirst(self::STATE_PUBLISHED))
        ];
    }
}
