<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ClientType extends Enum
{
    const SHOPEE = 1;
    const ADVERTISEMENT = 2;
    const SHOPE = 3;
    const UBEREAT = 4;
    const FOODPANDA = 5;
}
