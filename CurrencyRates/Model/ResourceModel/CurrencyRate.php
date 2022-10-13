<?php

namespace ELogic\CurrencyRates\Model\ResourceModel;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use ELogic\CurrencyRates\Api\Data\CurrencyRateInterface;
use ELogic\CurrencyRates\Api\Data\CurrencyRateSearchResoultsInterface;

class CurrencyRate extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
       $this->_init('currency_rate', 'id');
    }
}
