<?php

namespace App\Models\Types;


class EventTypes extends EnumType
{
    public const PRODUCT_WAS_CREATED = 'ProductWasCreated';
    public const USER_ORDERED_PRODUCT = 'UserOrderedProduct';
    public const PRODUCT_WAS_UPDATED = 'ProductWasUpdated';
}
