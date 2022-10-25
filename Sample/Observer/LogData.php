<?php

namespace ELogic\Sample\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class LogData implements ObserverInterface
{
    private $logger;

    /**
     * Class LogData
     * @package  \ELogic\Sample\Observer\
     */
    public function __construct(\Psr\Log\LoggerInterface $logger){
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $this->logger->info('Somebody added product to cart');
    }
}
