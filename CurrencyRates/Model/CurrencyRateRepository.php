<?php

namespace ELogic\CurrencyRates\Model;

use ELogic\CurrencyRates\Api\CurrencyRateReposytoryInterface;
use ELogic\CurrencyRates\Api\Data\CurrencyRateInterface;
use ELogic\CurrencyRates\Api\Data\CurrencyRateSearchResoultsInterface;
use ELogic\CurrencyRates\Model\ResourceModel\CurrencyRate\Collection;
use Magento\CatalogRule\Model\ResourceModel\Product\CollectionProcessorFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Data\CollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;


/**
 * Class CurrencyRateRepository
 * @package ELogic\CurrencyRates\Model
 */
class CurrencyRateRepository implements CurrencyRateReposytoryInterface
{

    protected $resource;
    protected $currencyRateCollectionFactory;
    protected $storeManager;
    protected $currencyRateFactory;
    protected $searchResultsFactory;
    protected $collectionProcessor;
    protected $searchResultFactory;


    public function __construct(
        CurrencyRateSearchResoultFactory $currencyRateSearchResultFactory,
        ResourceCurrencyRate $resource,
        CurrencyRateFactory $currencyRateFactory,
        CollectionFactory $collectionFactory,
        CurrencyRateSearchResoultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor
    )
    {
        $this->searchResultFactory = $searchResultsFactory;
        $this->resource = $resource;
        $this->currencyRateFactory = $currencyRateFactory;
        $this->currencyRateCollectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->$dataObjectHelper = $dataObjectHelper;
        $this->$dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
    }


    public function save(\ELogic\CurrencyRates\Api\Data\CurrencyRateInterface $currencyRate)
    {
        try {
            $this->resource->save($currencyRate);
        }
        catch (\Exception $exception){
            throw new CouldNotSaveException(__(
                'Could not save the CurrencyRate: %1',
                $exception->getMessage()
            ));
        }
        return $currencyRate;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        $collection = $this->currencyRateCollectionFactory->create();

        $this->addFiltersToCollection($criteria, $collection);
        $collection->load();
        return $this->buildSearchResult($criteria, $collection);
    }

    public function delete(\ELogic\CurrencyRates\Api\Data\CurrencyRateInterface $currencyRate)
    {
        try
        {
            $currencyRateModel = $this->currencyRateFactory->create();
            $this->resource->load($currencyRateModel, $currencyRate->getEntityId());
            $this->resource->delete($currencyRateModel);
        }catch (\Exception $exception){
            throw new CouldNotDeleteException(__(
                'Could not delete the currencyRate: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    public function deleteById($entityId)
    {
        return $this->delete($this->get($entityId));
    }

    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup){
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultsFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItem($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * @param string $currencyCode
     * @return CurrencyRateInterface
     * @throws NoSuchEntityException
     */

    private function get(string $currencyCode)
    {
        $currencyRateItem = $this->currencyRateFactory->create();
        $this->resource->load($currencyRateItem, $currencyCode, 'currency_to');
        if(!$currencyRateItem->getId()){
            throw new NoSuchEntityException(__(
               'Currency Code does not exist',
                $currencyCode
            ));
        }
        return $currencyRateItem->getDataModel();
    }
}
