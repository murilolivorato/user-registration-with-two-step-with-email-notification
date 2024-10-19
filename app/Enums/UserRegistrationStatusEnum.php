<?php

namespace App\Enums;

namespace App\Enums;

use App\Traits\EnumList;

enum UserRegistrationStatusEnum: string
{
    use EnumList;
    case ACTIVE = 'active';
    case START = 'start';
    case EMAIL_SENT = 'email_sent';
    case WAITING_APPROVAL = 'waiting_approval';
    case CANCELED = 'canceled';
}
