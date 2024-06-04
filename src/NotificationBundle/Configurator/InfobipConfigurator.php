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

use SolidInvoice\NotificationBundle\Form\Type\Transport\InfobipType;
use Symfony\Component\Notifier\Transport\Dsn;
use function sprintf;

/**
 * @codeCoverageIgnore
 */
final class InfobipConfigurator implements ConfiguratorInterface
{
    public static function getName(): string
    {
        return 'Infobip';
    }

    public static function getType(): string
    {
        return 'texter';
    }

    public function getForm(): string
    {
        return InfobipType::class;
    }

    /**
     * @param array{ auth_token: string, host: string, from: string } $config
     */
    public function configure(array $config): Dsn
    {
        return new Dsn(sprintf('infobip://%s@%s?from=%s', $config['auth_token'], $config['host'], $config['from']));
    }
}
