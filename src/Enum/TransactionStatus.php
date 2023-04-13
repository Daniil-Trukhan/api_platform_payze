<?php

declare(strict_types=1);

namespace Trukhan\Payze\Enum;

enum TransactionStatus: string
{
    private const INCOMPLETE = [
        self::CREATED,
        self::NOTHING,
    ];
    private const PAID = [
        self::COMMITTED,
        self::BLOCKED,
        self::REFUNDED_PARTIALLY,
        self::CARD_ADDED,
        self::CARD_ADDED_FOR_SUBSCRIPTION,
    ];

    case BLOCKED = 'Blocked';

    case CARD_ADDED = 'CardAdded';

    case CARD_ADDED_FOR_SUBSCRIPTION = 'CardAddedForSubscription';

    case COMMIT_FAILED = 'CommitFailed';

    case COMMITTED = 'Committed';

    case CREATED = 'Created';

    case NOTHING = 'Nothing';

    case ERROR = 'Error';

    case REFUNDED = 'Refunded';

    case REFUNDED_PARTIALLY = 'RefundedPartially';

    case REJECTED = 'Rejected';

    case TIMEOUT = 'Timeout';

    /** Check if status is completed */
    public static function isCompleted(string $status): bool
    {
        return !in_array($status, self::INCOMPLETE, true);
    }

    /** Check if status is paid */
    public static function isPaid(string $status): bool
    {
        return in_array($status, self::PAID, true);
    }
}
