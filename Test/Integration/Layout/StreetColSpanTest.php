<?php
declare(strict_types=1);

namespace LokiCheckout\Nl\Test\Integration\Layout;

use Loki\Components\Util\Controller\LayoutLoader;
use LokiCheckout\Core\Config\Config;
use LokiCheckout\Core\ViewModel\CheckoutState;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\LayoutInterface;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Quote\Test\Fixture\GuestCart as GuestCartFixture;
use Magento\TestFramework\Fixture\AppArea;
use Magento\TestFramework\Fixture\Config as ConfigFixture;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

#[DataFixture(GuestCartFixture::class, as: 'cart')]
#[AppArea('frontend')]
class StreetColSpanTest extends TestCase
{
    #[ConfigFixture('loki_checkout/general/theme', 'default', 'store', 'default')]
    public function testStreetColSpansWithDefaultSkin(): void
    {
        $layout = $this->getLayout('NL', 'NL');
        $this->assertStreetColSpans($layout, 'shipping');
        $this->assertStreetColSpans($layout, 'billing');
    }

    #[ConfigFixture('loki_checkout/general/theme', 'onestep', 'store', 'default')]
    public function testStreetColSpansWithOnestepSkin(): void
    {
        $layout = $this->getLayout('NL', 'NL');
        $this->assertStreetColSpans($layout, 'shipping');
        $this->assertStreetColSpans($layout, 'billing');
    }

    #[ConfigFixture('loki_checkout/general/theme', 'default', 'store', 'default')]
    public function testMixedCountriesWithDutchBillingAddress(): void
    {
        $layout = $this->getLayout('DE', 'NL');
        $this->assertStreetColSpans($layout, 'billing');

        foreach (['street1', 'street2'] as $field) {
            $blockName = 'loki-checkout.shipping.address.'.$field;
            $block = $layout->getBlock($blockName);
            $this->assertInstanceOf(AbstractBlock::class, $block, $blockName);
            $this->assertNotEquals(3, (int)$block->getMdColSpan(), $blockName.' md_col_span');
        }

        $config = Bootstrap::getObjectManager()->get(Config::class);
        $billingForm = $layout->getBlock('loki-checkout.billing.address.form');
        $shippingForm = $layout->getBlock('loki-checkout.shipping.address.form');
        $this->assertEquals('netherlands', $config->getGrid($billingForm)->getName());
        $this->assertNotEquals('netherlands', $config->getGrid($shippingForm)->getName());
    }

    private function assertStreetColSpans(LayoutInterface $layout, string $addressType): void
    {
        foreach (['street1', 'street2'] as $field) {
            $blockName = 'loki-checkout.'.$addressType.'.address.'.$field;
            $block = $layout->getBlock($blockName);
            $this->assertInstanceOf(AbstractBlock::class, $block, $blockName);
            $this->assertEquals(6, (int)$block->getColSpan(), $blockName.' col_span');
            $this->assertEquals(3, (int)$block->getMdColSpan(), $blockName.' md_col_span');
        }
    }

    private function getLayout(string $shippingCountryId, string $billingCountryId): LayoutInterface
    {
        $objectManager = Bootstrap::getObjectManager();
        $cart = $objectManager->get(DataFixtureStorageManager::class)->getStorage()->get('cart');
        $cart = $objectManager->get(CartRepositoryInterface::class)->get((int)$cart->getId());
        $cart->getShippingAddress()->setCountryId($shippingCountryId);
        $cart->getBillingAddress()->setCountryId($billingCountryId);

        $checkoutState = $objectManager->get(CheckoutState::class);
        $checkoutState->setQuote($cart);
        $checkoutState->setQuoteId((int)$cart->getId());
        $objectManager->get(CheckoutSession::class)->replaceQuote($cart);

        return $objectManager->get(LayoutLoader::class)->load(['checkout_index_index'], [], true);
    }
}
