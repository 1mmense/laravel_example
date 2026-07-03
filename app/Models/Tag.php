<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $color_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Job> $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @method static \Database\Factories\TagFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereColorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    // protected const TAG_COLORS = [
    //     'bg-red-400/10 text-red-400 inset-ring-red-400/20',
    //     'bg-gray-400/10 text-orange-400 inset-ring-gray-400/20',
    //     'bg-yellow-400/10 text-yellow-500 inset-ring-yellow-400/20',
    //     'bg-green-400/10 text-green-400 inset-ring-green-500/20',
    //     'bg-blue-400/10 text-cyan-400 inset-ring-blue-400/30',
    //     'bg-blue-400/10 text-blue-400 inset-ring-blue-400/30',
    //     'bg-purple-400/10 text-purple-400 inset-ring-purple-400/30',
    //     'bg-pink-400/10 text-pink-400 inset-ring-pink-400/20',
    // ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // public static function getTagColors()
    // {
    //     return self::TAG_COLORS;
    // }

    // protected function getColorAttribute()
    // {
    //     $hash = abs(crc32($this->name));

    //     return $this::TAG_COLORS[$hash % count($this::TAG_COLORS)];

    //     // return $this::TAG_COLORS[$this->id % count($this::TAG_COLORS)];
    // }
}
