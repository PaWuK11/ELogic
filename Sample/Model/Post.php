<?php

namespace ELogic\Sample\Model;


class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'elogic_post';

    protected $_cacheTag = 'elogic_post';

    protected $_eventPrefix = 'elogic_post';

    public function _construct()
    {
        $this->_init('ELogic\Sample\Model\ResourceModel\Post');
    }

    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues(): array
    {
        $values = [];

        return $values;
    }
}
