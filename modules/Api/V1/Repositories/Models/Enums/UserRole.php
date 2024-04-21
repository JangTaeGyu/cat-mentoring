<?php

namespace Modules\Api\V1\Repositories\Models\Enums;

enum UserRole: string
{
    case MENTEE = 'MENTEE';
    case MENTOR = 'MENTOR';
    case ADMIN = 'ADMIN';
}
