<?php

declare(strict_types=1);

/*
 * This file is part of SolidInvoice project.
 *
 * (c) Pierre du Plessis <open-source@solidworx.co>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

// !! This file is autogenerated. Do not edit. !!

namespace SolidInvoice\NotificationBundle\Configurator;

use SolidInvoice\NotificationBundle\Form\Type\Transport\RocketChatType;
use Symfony\Component\Notifier\Transport\Dsn;
use function sprintf;

final class RocketChatConfigurator implements ConfiguratorInterface
{
    public static function getName(): string
    {
        return 'RocketChat';
    }

    public static function getType(): string
    {
        return 'chatter';
    }

    public function getForm(): string
    {
        return RocketChatType::class;
    }

    /**
     * @param array{ token: string, endpoint: string, channel: string } $config
     */
    public function configure(array $config): Dsn
    {
        return new Dsn(sprintf('rocketchat://%s@%s?channel=%s', $config['token'], $config['endpoint'], $config['channel']));
    }
}