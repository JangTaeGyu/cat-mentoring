<?php

namespace Modules\Api\V1\Repositories\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Modules\Api\V1\Repositories\Models\Enums\UserRole;
use Modules\Api\V1\Repositories\UserRepositoryInterface;

/**
 * Modules\Api\V1\Repositories\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property UserRole $role
 * @property string $cat_breed
 * @property string $cat_age
 * @property Carbon|null $signup_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'role',
        'approved_id',
        'cat_breed',
        'cat_age',
        'signup_at',
        'approved_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserRole::class,
    ];

    protected $dates = [
        'signup_at',
        'approved_at',
        'created_at',
        'updated_at'
    ];

    public function repository(): UserRepositoryInterface
    {
        return app(UserRepositoryInterface::class)->setModel($this);
    }

    public function isSignuped(): bool
    {
        return $this->signup_at !== null;
    }
}
