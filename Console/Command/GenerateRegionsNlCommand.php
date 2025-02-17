<?php declare(strict_types=1);

namespace Yireo\LokiCheckoutNl\Console\Command;

use Magento\Directory\Setup\DataInstallerFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Yireo\LokiCheckoutNl\DataProvider\DutchRegionDataProvider;

class GenerateRegionsNlCommand extends Command
{
    public function __construct(
        private DataInstallerFactory $dataInstallerFactory,
        private DutchRegionDataProvider $dutchRegionDataProvider,
        private ModuleDataSetupInterface $moduleDataSetup,
        ?string $name = null
    ) {
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('yireo:loki-checkout:generate-regions:nl');
        $this->setDescription('Generate Dutch regions in the Magento database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $dataInstaller = $this->dataInstallerFactory->create();
        $dataInstaller->addCountryRegions(
            $this->moduleDataSetup->getConnection(),
            $this->dutchRegionDataProvider->getRegions(),
        );

        return Command::SUCCESS;
    }
}
