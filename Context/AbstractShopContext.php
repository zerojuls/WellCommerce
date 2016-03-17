<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\ShopBundle\Context;

use WellCommerce\Bundle\ShopBundle\Entity\ShopInterface;

/**
 * Class AbstractShopContext
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractShopContext
{
    /**
     * @var ShopInterface
     */
    protected $currentShop;

    /**
     * {@inheritdoc}
     */
    public function getCurrentShop() : ShopInterface
    {
        return $this->currentShop;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrentShop(ShopInterface $shop)
    {
        $this->currentShop = $shop;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentShopIdentifier() : int
    {
        return $this->currentShop->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function hasCurrentShop() : bool
    {
        return $this->currentShop instanceof ShopInterface;
    }
}
