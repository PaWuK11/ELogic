<?php

namespace ELogic\CurrencyRates\Api\Data;

use Magento\Tests\NamingConvention\true\string;

/**
 * Interface CurrencyRateInterface
 * @package ELogic\CurrencyRates\Api\Data
 */

interface CurrencyRateInterface
{
    const ENTITY_ID = 'id';
    const CURRENCY_FROM = 'currency_from';
    const CURRENCY_TO = 'currency_to';
    const COST_PRICE_RATE = 'cost_price_rate';
    const PRICE_MATRIX_RATE = 'price_matrix_currency_rate';

    /**
     * Get entity_id
     * @return int|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param int $rateId
     * @return CurrencyRateInterface
     */
    public function setEntityId();
    /**
     * @return string|null
     */
    public function getCurrencyFrom();
    /**
     * @param int $currency
     * @return CurrencyRateInterface
     */
    public function setCurrencyFrom(string $currency);
    /**
     * @return string|null
     */
    public function getCurrencyTo();

    /**
     * @param int $currency
     * @return CurrencyRateInterface
     */
    public function setCurrencyTo(string $currency);
    /**
     * @return string|null
     */
    public function getCostPriceCurrencyRate();

    /**
     * @param $rate
     * @return CurrencyRateInterface
     */
    public function setCostPriceCurrencyRate($rate);
    /**
     * @return string|null
     */
    public function getPriceMatrixCurrencyRate();

    /**
     * @param $rate
     * @return CurrencyRateInterface
     */
    public function setPriceMatrixCurrencyRate($rate);

}
