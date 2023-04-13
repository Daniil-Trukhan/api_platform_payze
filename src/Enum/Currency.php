<?php

declare(strict_types=1);

namespace Trukhan\Payze\Enum;

enum Currency: string
{
    public const DEFAULT = self::GEL;

    public const STRICT = true;

    public const SUPPORTED = [
        self::GEL,
        self::USD,
        self::UZS,
    ];

    case GEL = 'GEL';

    case USD = 'USD';

    case UZS = 'UZS';
}
