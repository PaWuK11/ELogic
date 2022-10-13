<?php

namespace ELogic\CurrencyRates\Model\ResourceModel\CurrencyRate;

/**
 * Class Collection
 * @package ELogic\CurrencyRates\Model\ResourceModel\CurrencyRate
 */

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $idFieldName = 'id';

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \ELogic\CurrencyRates\Model\CurrencyRate::class,
            \ELogic\CurrencyRates\Model\ResourceModel\CurrencyRate::class
        );
    }

}
