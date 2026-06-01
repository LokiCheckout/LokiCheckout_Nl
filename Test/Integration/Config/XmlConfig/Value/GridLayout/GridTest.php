<?php
declare(strict_types=1);

namespace LokiCheckout\Nl\Test\Integration\Config\XmlConfig\Value\GridLayout;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Fixture\Cache;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use LokiCheckout\Core\Config\XmlConfig;

class GridTest extends TestCase
{
    /**
     * @return void
     * @dataProvider getTestGridBlockArguments
     */
    #[Cache('config', false)]
    public function testGridBlock(string $gridName, string $blockAlias, int $colSpan, int $mdColspan)
    {
        $xmlConfig = $this->getObjectManager()->get(XmlConfig::class);
        $gridLayout = $xmlConfig->getGridLayout('default_grid');

        $gridNames = $gridLayout->getGridNames();
        $this->assertContains($gridName, $gridNames, var_export($gridNames, true));

        $grid = $gridLayout->getGridByName($gridName);
        $block = $grid->getBlock($blockAlias);
        $this->assertEquals($colSpan, $block->getColSpan());
        $this->assertEquals($mdColspan, $block->getMdColSpan());
    }

    public function getTestGridBlockArguments(): array
    {
        return [
            ['netherlands', 'city', 12, 6],
            ['netherlands', 'country_id', 12, 12],
        ];
    }

    /**
     * @return ObjectManagerInterface
     */
    private function getObjectManager(): ObjectManagerInterface
    {
        return ObjectManager::getInstance();
    }
}
