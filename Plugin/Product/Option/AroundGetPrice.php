<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MageWorx\DisableCatalogRuleForOptions\Plugin\Product\Option;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Option;
use Magento\Framework\Model\AbstractModel;
use Magento\Catalog\Pricing\Price\BasePrice;
use Magento\Catalog\Pricing\Price\CalculateCustomOptionCatalogRule;
use Magento\Framework\App\ObjectManager;
use Magento\Catalog\Pricing\Price\CustomOptionPriceCalculator;
use Magento\Catalog\Pricing\Price\RegularPrice;

/**
 * Class AroundGetPrice
 *
 * @package MageWorx\DisableCatalogRuleForOptions\Plugin\Product\Option
 */
class AroundGetPrice
{
    const KEY_PRICE = 'price';

    /**
     * @var CustomOptionPriceCalculator
     */
    private $customOptionPriceCalculator;

    /**
     * AroundGetPrice constructor.
     *
     * @param CustomOptionPriceCalculator|null $customOptionPriceCalculator
     */
    public function __construct(
        CustomOptionPriceCalculator $customOptionPriceCalculator = null
    ) {
        $this->customOptionPriceCalculator = $customOptionPriceCalculator
            ?? ObjectManager::getInstance()->get(CustomOptionPriceCalculator::class);
    }

    /**
     * Return price. If $flag is true and price is percent return converted percent to price
     *
     * @param bool $flag
     * @return float|int
     */
    public function AroundGetPrice($subject, $proceed, $flag = false)
    {
        if ($flag) {
            return $this->customOptionPriceCalculator->getOptionPriceByPriceCode($subject, BasePrice::PRICE_CODE);
        }
        return $this->_getData(self::KEY_PRICE);
    }
}
