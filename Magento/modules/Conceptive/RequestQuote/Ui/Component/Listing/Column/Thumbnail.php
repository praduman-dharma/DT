<?php

namespace Conceptive\RequestQuote\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Catalog\Helper\Image as ImageHelper;
use Magento\Framework\UrlInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Thumbnail extends Column
{
    public const NAME = 'thumbnail';

    /**
     * @var ImageHelper
     */
    protected $imageHelper;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param ImageHelper $imageHelper
     * @param UrlInterface $urlBuilder
     * @param ProductRepositoryInterface $productRepository
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        ImageHelper $imageHelper,
        UrlInterface $urlBuilder,
        ProductRepositoryInterface $productRepository,
        array $components = [],
        array $data = []
    ) {
        $this->imageHelper = $imageHelper;
        $this->urlBuilder = $urlBuilder;
        $this->productRepository = $productRepository;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                try {
                    $product = $this->productRepository->getById($item['product_id']);
                    $imageUrl = $this->imageHelper->init($product, 'product_listing_thumbnail')->getUrl();

                    $item[$fieldName . '_src'] = $imageUrl;
                    $item[$fieldName . '_alt'] = $product->getName();
                    $item[$fieldName . '_link'] = $this->urlBuilder->getUrl(
                        'catalog/product/edit',
                        ['id' => $product->getId()]
                    );
                    $origImageHelper = $this->imageHelper->init($product, 'product_listing_thumbnail_preview');
                    $item[$fieldName . '_orig_src'] = $origImageHelper->getUrl();
                } catch (\Exception $e) {
                    // Handle product load exception if any
                    $item[$fieldName . '_src'] = '';
                    $item[$fieldName . '_alt'] = __('No Image');
                    $item[$fieldName . '_link'] = '#';
                }
            }
        }

        return $dataSource;
    }
}
