<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Timeline extends Model
{
    use HasFactory;

    const STATE_HIDDEN = "hidden";
    const STATE_VISIBLE = "visible";

    protected $fillable = [
        'title',
        'description',
        'short_description',
        'state',
        'color'
    ];

    public static function states(): array
    {
        return [
            self::STATE_HIDDEN => __(ucfirst(self::STATE_HIDDEN)),
            self::STATE_VISIBLE => __(ucfirst(self::STATE_VISIBLE))
        ];
    }

    public function getPublishedPosts() : Collection
    {
        return Post::where('timeline_id', '=', $this->id)
            ->where('state', '=', Post::STATE_PUBLISHED)
            ->orderBy('date', 'asc')
            ->get();
    }

    public function getPeriod(): string
    {
        $period = "";
        $posts = $this->getPublishedPosts();
        if (!$posts->isEmpty()) {
            $periodArr = array_unique([
                date("Y", strtotime($posts->first()->date)),
                date("Y", strtotime($posts->last()->date))
            ]);
            $period = implode(" - ", $periodArr);
        }

        return $period;
    }
}
