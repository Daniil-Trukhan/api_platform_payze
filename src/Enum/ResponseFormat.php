<?php

declare(strict_types=1);

namespace Trukhan\Payze\Enum;

enum ResponseFormat: string
{
    case JSON = 'json';
    case JSONLD = 'jsonld';
}
