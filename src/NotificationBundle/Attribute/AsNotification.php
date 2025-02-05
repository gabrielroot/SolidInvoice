<?php

/*
 * This file is part of SolidInvoice project.
 *
 * (c) Pierre du Plessis <open-source@solidworx.co>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SolidInvoice\NotificationBundle\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final class AsNotification
{
    public function __construct(
        public string $name
    ) {
    }
}
