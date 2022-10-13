<?php

namespace ELogic\CurrencyRates\Model;

use ELogic\CurrencyRates\Api\Data\CurrencyRateInterface;
use ELogic\CurrencyRates\Api\CurrencyRateReposytoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;

class CurrencyRate extends AbstractModel implements CurrencyRateInterface
{
    /**
     * @var CurrencyRateInterfaceFactory
     */
    protected $currencyRateInterfaceFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * CurrencyRate constructor.
     * @param Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CurrencyRateInterfaceFactory $currencyRateFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param ResourceModel\CurrencyRate $resource
     * @param \Magento\Framework\Api\Data\Collection\AbstractDB|null $resourceCollection
     * @param array $data
     */

    public function __construct(
        Context $context,
        \Magento\Framework\Registry $registry,
        CurrencyRateInterfaceFactory $currencyRateFactory,
        ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [])
    {
        $this->dataObjectHelper = $this->dataObjectHelper;
        $this->$currencyRateFactory = $currencyRateFactory;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * @retrun mixed
     */

    public function getDataModel()
    {
        $currencyRateData = $this->getData();

        $currencyRateDataObject = $this->currencyRateFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $currencyRateDataObject,
            $currencyRateData,
            CurrencyRateInterface::class
        );

        return $currencyRateDataObject;
    }

    public function _construct()
    {
        $this->_init(\ELogic\CurrencyRates\Model\ResourceModel\CurrencyRate::class);
    }

    /**
     * @retrun array/mixed/string/null
     */
    public function getCurrencyFrom(){
        return $this->getData(self::CURRENCY_FROM);
    }

    public function setCurrentFrom(string $currency){
        return $this->GetData(self::CURRENCY_FROM, $currency);
    }
}
