<?php

namespace Conceptive\CustomCache\Model;

use Magento\Framework\App\CacheInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\App\Cache\TypeListInterface;

class OperateCustomCache
{
    protected $cache;

    protected $serializer;

    protected $typeList;

    /**
     * @param CacheInterface $cache
     * @param SerializerInterface $serializer
     * @param TypeListInterface $typeList
     */
    public function __construct(    
        CacheInterface $cache, 
        SerializerInterface $serializer,
        TypeListInterface $typeList
    ){
        $this->cache = $cache;
        $this->serializer = $serializer;
        $this->typeList = $typeList;
    }

    public function saveCache($cacheData) {
        $cacheKey  = \Conceptive\CustomCache\Model\Cache\Type\CacheType::TYPE_IDENTIFIER;
        $cacheTag  = \Conceptive\CustomCache\Model\Cache\Type\CacheType::CACHE_TAG;
        
        $storeData = $this->cache->save(
            $this->serializer->serialize($cacheData),
            $cacheKey,
            [$cacheTag],
            86400
        );
    }

    public function getCache() {
        $cacheKey  = \Conceptive\CustomCache\Model\Cache\Type\CacheType::TYPE_IDENTIFIER;

        $data = $this->serializer->unserialize( 
            $this->cache->load($cacheKey)
        );

        return $data;
    }

    public function invalidateCache() {
        $cacheKey  = \Conceptive\CustomCache\Model\Cache\Type\CacheType::TYPE_IDENTIFIER;

        $this->typeList->invalidate($cacheKey);
    }

    public function cleanCache() {
        $cacheKey  = \Conceptive\CustomCache\Model\Cache\Type\CacheType::TYPE_IDENTIFIER;
        
        $this->typeList->cleanType($cacheKey);
    }
}
