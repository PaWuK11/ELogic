<?php

namespace ELogic\Sample\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{
    protected  pageFactory $_pageFactory;
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
