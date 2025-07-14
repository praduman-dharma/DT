<?php

namespace Conceptive\RequestQuote\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Conceptive\RequestQuote\Model\Config\Source\Status as StatusSource;

/**
 * Class Status
 * Represents the status column in the request quote listing UI component.
 */
class Status extends Column
{
    /**
     * @var StatusSource
     * Instance of status source for retrieving status options.
     */
    protected $statusSource;

    /**
     * Constructor
     *
     * @param ContextInterface $context UI component context.
     * @param UiComponentFactory $uiComponentFactory UI component factory.
     * @param StatusSource $statusSource Instance of status source.
     * @param array $components UI component components.
     * @param array $data Additional data.
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        StatusSource $statusSource,
        array $components = [],
        array $data = []
    ) {
        $this->statusSource = $statusSource;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare data source for the status column.
     *
     * @param array $dataSource Data source array.
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $statusOptions = $this->statusSource->toArray();
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['status'])) {
                    $statusValue = $item['status'];
                    $label = $statusOptions[$statusValue] ?? __('Unknown');
                    $color = $this->getColor($statusValue);
                    $item['status'] = '<span class="status-label status-' . $statusValue . '" style="background-color: ' . $color . ';">' . $label . '</span>';
                }
            }
        }
        return $dataSource;
    }

    /**
     * Get the color associated with a status.
     *
     * @param string $status The status value.
     * @return string
     */
    private function getColor($status)
    {
        $colors = [
            'approved' => 'green',
            'declined' => 'red',
            'pending' => 'orange',
            'completed' => 'blue'
        ];

        return $colors[$status] ?? 'gray';
    }
}
