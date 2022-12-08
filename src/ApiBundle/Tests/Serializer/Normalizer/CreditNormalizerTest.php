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

namespace SolidInvoice\ApiBundle\Tests\Serializer\Normalizer;

use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use SolidInvoice\ApiBundle\Serializer\Normalizer\CreditNormalizer;
use SolidInvoice\ClientBundle\Entity\Credit;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreditNormalizerTest extends TestCase
{
    public function testSupportsNormalization(): void
    {
        $parentNormalizer = new class() implements NormalizerInterface, DenormalizerInterface {
            public function normalize($object, $format = null, array $context = [])
            {
                return $object;
            }

            public function supportsNormalization($data, $format = null)
            {
                return true;
            }

            public function supportsDenormalization($data, $type, $format = null)
            {
                return true;
            }

            public function denormalize($data, $class, $format = null, array $context = [])
            {
                return $data;
            }
        };

        $normalizer = new CreditNormalizer($parentNormalizer);

        self::assertTrue($normalizer->supportsNormalization(new Credit()));
        self::assertFalse($normalizer->supportsNormalization(Credit::class));
    }

    public function testSupportsDenormalization(): void
    {
        $parentNormalizer = new class() implements NormalizerInterface, DenormalizerInterface {
            public function normalize($object, $format = null, array $context = [])
            {
                return $object;
            }

            public function supportsNormalization($data, $format = null)
            {
                return true;
            }

            public function supportsDenormalization($data, $type, $format = null)
            {
                return true;
            }

            public function denormalize($data, $class, $format = null, array $context = [])
            {
                return $data;
            }
        };

        $normalizer = new CreditNormalizer($parentNormalizer);

        self::assertTrue($normalizer->supportsDenormalization(null, Credit::class));
        self::assertFalse($normalizer->supportsDenormalization([], NormalizerInterface::class));
    }

    public function testNormalization(): void
    {
        $parentNormalizer = new class() implements NormalizerInterface, DenormalizerInterface {
            public function normalize($object, $format = null, array $context = [])
            {
                return $object;
            }

            public function supportsNormalization($data, $format = null)
            {
                return true;
            }

            public function supportsDenormalization($data, $type, $format = null)
            {
                return true;
            }

            public function denormalize($data, $class, $format = null, array $context = [])
            {
                return $data;
            }
        };

        $normalizer = new CreditNormalizer($parentNormalizer);

        $credit = new Credit();
        $money = new Money(10000, new Currency('USD'));
        $credit->setValue($money);

        self::assertEquals($money, $normalizer->normalize($credit));
    }

    public function testDenormalization(): void
    {
        $parentNormalizer = new class() implements NormalizerInterface, DenormalizerInterface {
            public function normalize($object, $format = null, array $context = [])
            {
                return $object;
            }

            public function supportsNormalization($data, $format = null)
            {
                return true;
            }

            public function supportsDenormalization($data, $type, $format = null)
            {
                return true;
            }

            public function denormalize($data, $class, $format = null, array $context = [])
            {
                return 123;
            }
        };

        $normalizer = new CreditNormalizer($parentNormalizer);

        self::assertSame(123, $normalizer->denormalize([], Credit::class));
    }
}
