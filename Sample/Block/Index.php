<?php

namespace ELogic\Sample\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Index extends Template
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function sayHello(){
        return __('Hello World');
    }
}
