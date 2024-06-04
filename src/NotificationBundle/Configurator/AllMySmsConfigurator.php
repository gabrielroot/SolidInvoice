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

use SolidInvoice\NotificationBundle\Form\Type\Transport\AllMySmsType;
use Symfony\Component\Notifier\Transport\Dsn;
use function sprintf;

final class AllMySmsConfigurator implements ConfiguratorInterface
{
    public static function getName(): string
    {
        return 'AllMySms';
    }

    public static function getType(): string
    {
        return 'texter';
    }

    public function getForm(): string
    {
        return AllMySmsType::class;
    }

    /**
     * @param array{ login: string, apikey: string, from: string } $config
     */
    public function configure(array $config): Dsn
    {
        return new Dsn(sprintf('allmysms://%s:%s@default?from=%s', $config['login'], $config['apikey'], $config['from']));
    }
}