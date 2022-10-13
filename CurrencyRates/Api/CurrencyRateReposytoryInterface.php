<?php

namespace ELogic\CurrencyRates\Api;


use Magento\Tests\NamingConvention\true\string;

/**
 *
 */
interface CurrencyRateReposytoryInterface
{

    /**
     * Save eav_attribute_option_custom_price
     * @param \ELogic\CurrencyRates\Api\Data\CurrencyRateInterface $currencyRate
     * @returns  \ELogic\CurrencyRates\Api\Data\CurrencyRateInterface
     * @throws  \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \ELogic\CurrencyRates\Api\Data\CurrencyRateInterface $currencyRate
    );

    /**
     * Retrieve eav_attribute_option_custom_price matching the specified
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @returns  \ELogic\CurrencyRates\Api\Data\CurrencyRateSearchResoultsInterface
     * @throws  \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete eav_attribute_option_custom_price
     * @param \ELogic\CurrencyRates\Api\Data\CurrencyRateInterface $currencyRate
     * @returns  bool true on success
     * @throws  \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \ELogic\CurrencyRates\Api\Data\CurrencyRateInterface $currencyRate
    );

    /**
     * Delete eav_attribute_option_custom_price by ID
     * @param   string $currencyRateId
     * @returns  bool true on success
     * @throws  \Magento\Framework\Exception\LocalizedException
     * @throws  \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById(string $currencyRateId);
}
