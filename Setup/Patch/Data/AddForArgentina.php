<?php

namespace OH\DirectoryArg\Setup\Patch\Data;

use Magento\Directory\Setup\DataInstaller;
use Magento\Directory\Setup\Patch\Data\InitializeDirectoryData;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;

/**
 * Add Regions for Argentina.
 */
class AddForArgentina implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var \Magento\Directory\Setup\DataInstallerFactory
     */
    private $dataInstallerFactory;

    /**
     * AddDataForIndia constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param \Magento\Directory\Setup\DataInstallerFactory $dataInstallerFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        \Magento\Directory\Setup\DataInstallerFactory $dataInstallerFactory
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->dataInstallerFactory = $dataInstallerFactory;
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {
        /** @var DataInstaller $dataInstaller */
        $dataInstaller = $this->dataInstallerFactory->create();
        $dataInstaller->addCountryRegions(
            $this->moduleDataSetup->getConnection(),
            $this->getDataForArg()
        );
    }

    /**
     * Argentina states data.
     *
     * @return array
     */
    private function getDataForArg()
    {
        return [
            ['AR', '901', 'Cudad Autónoma de Buenos Aires'],
            ['AR', '902', 'Buenos Aires AIRES'],
            ['AR', '903', 'Catamarca'],
            ['AR', '904', 'Córdoba'],
            ['AR', '905', 'Corrientes'],
            ['AR', '906', 'Chaco'],
            ['AR', '907', 'Chubut'],
            ['AR', '908', 'Entre ríos'],
            ['AR', '909', 'Formosa'],
            ['AR', '910', 'Jujuy'],
            ['AR', '911', 'La Pampa'],
            ['AR', '912', 'La Rioja'],
            ['AR', '913', 'Mendoza'],
            ['AR', '914', 'Misiones'],
            ['AR', '915', 'Neuquén'],
            ['AR', '916', 'Río negro'],
            ['AR', '917', 'Salta'],
            ['AR', '918', 'San Juan'],
            ['AR', '919', 'San Luis'],
            ['AR', '920', 'Santa cruz'],
            ['AR', '921', 'Santa fe'],
            ['AR', '922', 'Sgo. del estero'],
            ['AR', '923', 'Tierra del fuego'],
            ['AR', '924', 'Tucumán']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [
            InitializeDirectoryData::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }
}
