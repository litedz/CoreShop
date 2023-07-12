<?php

declare(strict_types=1);

/*
 * CoreShop
 *
 * This source file is available under two different licenses:
 *  - GNU General Public License version 3 (GPLv3)
 *  - CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 *
 */

namespace CoreShop\Component\Payment\Validator;

use CoreShop\Component\Payment\Model\PaymentProviderInterface;
use CoreShop\Component\Payment\Resolver\PaymentProviderResolverInterface;
use CoreShop\Component\Resource\Model\ResourceInterface;

class PaymentProviderValidator implements PaymentProviderValidatorInterface
{
    public function __construct(
        protected PaymentProviderResolverInterface $paymentProviderResolver,
    ) {
    }

    public function isPaymentProviderValid(
        PaymentProviderInterface $paymentProvider,
        ResourceInterface $subject = null,
    ): bool {
        $validProviders = $this->paymentProviderResolver->resolvePaymentProviders($subject);

        return in_array(
            $paymentProvider->getId(),
            array_map(static function (PaymentProviderInterface $paymentProvider) {
                return $paymentProvider->getId();
            }, $validProviders),
            true,
        );
    }
}