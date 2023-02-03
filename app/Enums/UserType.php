<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class UserType extends Enum
{
    const CUSTOMER = 0;
    const SELLER = 1;

}
