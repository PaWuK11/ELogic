<?php

namespace ELogic\Sample\Plugin;
/**
 *Class ExamplePlugin
 * @package ELogic\Sample\Plugin
 */
class ExamplePlugin
{
    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result){
        $title = $result.' '.'Have a good day';
        return $title;
    }
}
