<?php
declare(strict_types=1);

namespace LokiCheckout\Nl\Test\Integration\Layout;

use Loki\Components\Util\Controller\LayoutLoader;
use LokiCheckout\Core\ViewModel\CheckoutState;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\LayoutInterface;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Quote\Test\Fixture\GuestCart as GuestCartFixture;
use Magento\TestFramework\Fixture\AppArea;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

#[DataFixture(GuestCartFixture::class, as: 'cart')]
#[AppArea('frontend')]
class StreetColSpanTest extends TestCase
{
    #[Config('loki_checkout/general/theme', 'default', 'store', 'default')]
    public function testStreetColSpansWithDefaultSkin(): void
    {
        $this->assertStreetColSpans($this->getLayout());
    }

    #[Config('loki_checkout/general/theme', 'onestep', 'store', 'default')]
    public function testStreetColSpansWithOnestepSkin(): void
    {
        $this->assertStreetColSpans($this->getLayout());
    }

    private function assertStreetColSpans(LayoutInterface $layout): void
    {
        foreach (['shipping', 'billing'] as $addressType) {
            foreach (['street1', 'street2'] as $field) {
                $blockName = 'loki-checkout.'.$addressType.'.address.'.$field;
                $block = $layout->getBlock($blockName);
                $this->assertInstanceOf(AbstractBlock::class, $block, $blockName);
                $this->assertEquals(6, (int)$block->getColSpan(), $blockName.' col_span');
                $this->assertEquals(3, (int)$block->getMdColSpan(), $blockName.' md_col_span');
            }
        }
    }

    private function getLayout(): LayoutInterface
    {
        $objectManager = Bootstrap::getObjectManager();
        $cart = $objectManager->get(DataFixtureStorageManager::class)->getStorage()->get('cart');
        $cart = $objectManager->get(CartRepositoryInterface::class)->get((int)$cart->getId());
        $cart->getShippingAddress()->setCountryId('NL');
        $cart->getBillingAddress()->setCountryId('NL');

        $checkoutState = $objectManager->get(CheckoutState::class);
        $checkoutState->setQuote($cart);
        $checkoutState->setQuoteId((int)$cart->getId());
        $objectManager->get(CheckoutSession::class)->replaceQuote($cart);

        return $objectManager->get(LayoutLoader::class)->load(['checkout_index_index'], [], true);
    }
}
