<?php
namespace Magento\Catalog\Setup\Patch\Data;

use Magento\Framework\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;

class AddAlthernateColorAttribute implements DataPatchInterface
{
    private $moduleDataSetup;
    private $eavSetupFactory;

    /**
     * @param ModuleDataSetupInterface $categorySetup
     * @param EavSetupFactory $eavSetupFactory
     */

    public function __construct( ModuleDataSetupInterface $moduleDataSetup, EavSetupFactory $eavSetupFactory) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup'=> $this->moduleDataSetup]);
        $eavSetup->addAttribute('catalog_product','alternative_color',[
            'type'=>'int',
            'label'=>'Alternative Color',
            'input'=>'select',
            'used_in_product_listing'=> true,
            'user_defined'=> true,
        ]);
    }
}
