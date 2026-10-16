<?php
declare(strict_types=1);

namespace LokiCheckout\Nl\Test\Integration\I18n;

use Magento\Framework\App\Area;
use Magento\Framework\TranslateInterface;
use Magento\TestFramework\Fixture\AppArea;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[AppArea('frontend')]
class TranslationTest extends TestCase
{
    #[DataProvider('getTranslations')]
    public function testDutchTranslation(string $text, string $expectedTranslation): void
    {
        $translate = Bootstrap::getObjectManager()->create(TranslateInterface::class);
        $translate->setLocale('nl_NL');
        $translate->loadData(Area::AREA_FRONTEND, true);

        $translations = $translate->getData();
        $this->assertArrayHasKey($text, $translations, 'No Dutch translation for "'.$text.'"');
        $this->assertSame($expectedTranslation, $translations[$text]);
    }

    public static function getTranslations(): array
    {
        return [
            ['Street Name', 'Straatnaam'],
            ['Housenumber', 'Huisnummer'],
            ['Addition', 'Toevoeging'],
            ['Province', 'Provincie'],
        ];
    }
}
