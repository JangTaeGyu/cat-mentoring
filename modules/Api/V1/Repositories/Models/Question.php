<?php

namespace Modules\Api\V1\Repositories\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Api\V1\Repositories\QuestionRepositoryInterface;

/**
 * Modules\Api\V1\Repositories\Models\Question
 *
 * @property int $id
 * @property string $title
 * @property string $contents
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property User $user
 * @property Collection $answers
 */
class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'title',
        'contents',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function repository(): QuestionRepositoryInterface
    {
        return app(QuestionRepositoryInterface::class)->setModel($this);
    }

    public function getContentsFirst20CharOnly(): string
    {
        if (mb_strlen($this->contents) <= 20) return $this->contents;
        return mb_substr($this->contents, 0, 20) . '...';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
}
