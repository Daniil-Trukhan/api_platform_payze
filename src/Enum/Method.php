<?php

declare(strict_types=1);

namespace Trukhan\Payze\Enum;

enum Method: string
{
    case JUST_PAY = 'justPay';

    case ADD_CARD = 'addCard';

    case COMMIT = 'commit';

    case PAY_WITH_CARD = 'payWithCard';

    case REFUND = 'refund';

    case TRANSACTION_INFO = 'getTransactionInfo';

    case BALANCE = 'getBalance';
}
