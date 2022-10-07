<?php
namespace ELogic\Sample\Setup\Patch\Data;


use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;


class AddData implements DataPatchInterface
{
    private $moduleDataSetup;

    public function __construct( ModuleDataSetupInterface $moduleDataSetup) {
        $this->moduleDataSetup = $moduleDataSetup;
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
        $this->moduleDataSetup
            ->getConnection()
            ->delete($this->moduleDataSetup->getTable('admin_user_sesion'),['id' => '1']);
    }
}
