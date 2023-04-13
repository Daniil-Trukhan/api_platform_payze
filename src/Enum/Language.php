<?php

declare(strict_types=1);

namespace Trukhan\Payze\Enum;

enum Language: string
{
    public const DEFAULT = self::GEO;

    public const SUPPORTED = [
        self::GEO,
        self::ENG,
        self::UZB,
    ];

    case ENG = 'en';

    case GEO = 'ge';

    case UZB = 'uz';
}
