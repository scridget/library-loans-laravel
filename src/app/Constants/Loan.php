<?php

namespace App\Constants;

class Loan {
    const STATUS_REQUESTED = 1;
    const STATUS_ORDERED = 2;
    const STATUS_RECEIVED = 3;
    const STATUS_RETURNED = 4;
    const STATUS_WAITLISTED = 5;
    const STATUS_NON_SUPPLY = 6;

    const STATUSES = [
        self::STATUS_REQUESTED,
        self::STATUS_ORDERED,
        self::STATUS_RECEIVED,
        self::STATUS_RETURNED,
        self::STATUS_WAITLISTED,
        self::STATUS_NON_SUPPLY,
    ];

    const ACTIVE_STATUSES = [
        self::STATUS_REQUESTED,
        self::STATUS_ORDERED,
        self::STATUS_RECEIVED,
    ];

    const STATUS_LABELS = [
        self::STATUS_REQUESTED => 'Requested',
        self::STATUS_ORDERED => 'Ordered',
        self::STATUS_RECEIVED => 'Received',
        self::STATUS_RETURNED => 'Returned',
        self::STATUS_WAITLISTED => 'Waitlisted',
        self::STATUS_NON_SUPPLY => 'Non Supply',
    ];
}