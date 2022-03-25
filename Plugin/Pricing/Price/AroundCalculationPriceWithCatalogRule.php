<?php
/**
 * Copyright © MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace MageWorx\DisableCatalogRuleForOptions\Plugin\Pricing\Price;

use Magento\Catalog\Model\Product;

class AroundCalculationPriceWithCatalogRule
{
    /**
     * @param \Magento\Catalog\Pricing\Price\CalculateCustomOptionCatalogRule $subject
     * @param $proceed
     * @param Product $product
     * @param float $optionPriceValue
     * @param bool $isPercent
     * @return float|null
     */
    public function aroundExecute(
        \Magento\Catalog\Pricing\Price\CalculateCustomOptionCatalogRule $subject,
        \Closure $proceed,
        Product $product,
        float $optionPriceValue,
        bool $isPercent
    ): ?float {

        return null;
    }
}