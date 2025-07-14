<?php

namespace Conceptive\GraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\CustomerGraphQl\Model\Customer\GetCustomer;

class CurrentCustomer implements ResolverInterface
{
    private $getCustomer;

    public function __construct(GetCustomer $getCustomer)
    {
        $this->getCustomer = $getCustomer;
    }

    public function resolve(
        Field $field,
        $context, 
        ResolveInfo $resolveInfo,
        array $value = null,
        array $args = null
    ) {
        $customer = $this->getCustomer->execute($context);
        return $customer->getFirstname() ?: 'Guest';
    }
}
