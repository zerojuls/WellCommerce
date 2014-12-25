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

namespace WellCommerce\Bundle\CoreBundle\Helper\Doctrine;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class DoctrineHelper
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class DoctrineHelper implements DoctrineHelperInterface
{
    /**
     * @var ManagerRegistry
     */
    protected $registry;

    /**
     * Constructor
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * {@inheritdoc}
     */
    public function disableFilter($filter)
    {
        $this->getDoctrineFilters()->disable($filter);
    }

    /**
     * {@inheritdoc}
     */
    public function enableFilter($filter, array $parameters = [])
    {
        $filter = $this->getDoctrineFilters()->enable($filter);
        foreach ($parameters as $key => $value) {
            $filter->setParameter($key, $value);
        }

        return $filter;
    }

    /**
     * {@inheritdoc}
     */
    public function getDoctrineFilters()
    {
        return $this->getEntityManager()->getFilters();
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityManager()
    {
        return $this->registry->getManager();
    }
} 