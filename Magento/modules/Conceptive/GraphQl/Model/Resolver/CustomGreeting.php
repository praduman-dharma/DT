<?php

namespace Conceptive\GraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class CustomGreeting implements ResolverInterface
{
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $resolveInfo,
        array $value = null,
        array $args = null
    ) {
        $name = $args['name'] ?? 'Guest';
        return "Hello, " . $name . "! Welcome to Magento 2 GraphQL.";
    }
}
