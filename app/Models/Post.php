<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Post.
 *
 * @package App\Models
 * @author DaKoshin.
 */
class Post extends Model
{
    use HasFactory;

    /**
     * @var string[] fillable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'context',
    ];

    /**
     * Return post creator.
     *
     * @return BelongsTo|User
     */
    public function user(): BelongsTo|User
    {
        return $this->belongsTo(User::class);
    }
}
