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

namespace SolidInvoice\NotificationBundle\Form\Type\Transport;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * @codeCoverageIgnore
 */
final class LightSmsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'login',
            null,
            [
                'constraints' => new NotBlank(['groups' => 'lightsms']),
            ]
        );

        $builder->add(
            'token',
            null,
            [
                'constraints' => new NotBlank(['groups' => 'lightsms']),
            ]
        );

        $builder->add(
            'phone',
            null,
            [
                'constraints' => new NotBlank(['groups' => 'lightsms']),
            ]
        );
    }
}
