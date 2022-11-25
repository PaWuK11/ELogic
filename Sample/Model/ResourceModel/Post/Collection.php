<?php

namespace ELogic\Sample\Model\ResourceModel\Post;



class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('ELogic\Sample\Model\Post', 'ELogic\Sample\Model\ResourceModel\Post');
    }
}
