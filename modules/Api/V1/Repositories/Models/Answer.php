<?php

namespace Modules\Api\V1\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Api\V1\Repositories\AnswerRepositoryInterface;

/**
 * Modules\Api\V1\Repositories\Models\Answer
 *
 * @property int $id
 * @property string $contents
 * @property int $question_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $accepted_at
 * @property User $user
 */
class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'contents',
        'user_id',
        'accepted_at'
    ];

    protected $dates = [
        'created_at',
        'accepted_at'
    ];

    public $timestamps = false;

    public function repository(): AnswerRepositoryInterface
    {
        return app(AnswerRepositoryInterface::class)->setModel($this);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function isAccepted(): bool
    {
        return $this->accepted_at !== null;
    }
}
