import {Field} from '@loki-checkout/checkout-objects';
import {setupCheckout} from '@loki/setup-checkout';
import {expect, test} from '@loki/test';
import coreConfig from '@loki-checkout/config';

test.describe('country-switch', function () {
  test('should allow me to switch country', async function ({page, context}) {
    await setupCheckout(page, context, coreConfig);

    const countryField = new Field(page, 'shipping.country_id');
    const regionField = new Field(page, 'shipping.region');
    const postcodeField = new Field(page, 'shipping.postcode');
    const postcodeLabel = postcodeField.getLabelLocator();

    async function expectCountryFields(
      {
        country,
        regionRole,
        postcodePlaceholder,
        postcodeLabelText,
      }) {
      await Promise.all([
        page.waitForResponse(response =>
          response.status() === 200
        ),
        await countryField.fill(country)
      ]);

      await expect(regionField.getLocator()).toHaveRole(regionRole);

      if (postcodePlaceholder) {
        await expect(postcodeField.getLocator()).toHaveAttribute(
          'placeholder',
          postcodePlaceholder,
        );
      } else {
        await expect(postcodeField.getLocator()).not.toHaveAttribute(
          'placeholder');
      }

      await expect(postcodeLabel).toHaveText(postcodeLabelText);
    }

    const expectations = [
      {
        country: 'US',
        regionRole: 'combobox',
        postcodePlaceholder: '12345(-9999)',
        postcodeLabelText: 'Zipcode',
      },
      {
        country: 'NL',
        regionRole: 'textbox',
        postcodePlaceholder: '1234 AA',
        postcodeLabelText: 'Postcode',
      },
      {
        country: 'DE',
        regionRole: 'combobox',
        postcodePlaceholder: false,
        postcodeLabelText: 'Zip/Postal Code',
      },
      {
        country: 'NL',
        regionRole: 'textbox',
        postcodePlaceholder: '1234 AA',
        postcodeLabelText: 'Postcode',
      },
      {
        country: 'US',
        regionRole: 'combobox',
        postcodePlaceholder: '12345(-9999)',
        postcodeLabelText: 'Zipcode',
      },
      {
        country: 'DE',
        regionRole: 'combobox',
        postcodePlaceholder: false,
        postcodeLabelText: 'Zip/Postal Code',
      },
    ];

    for (const expectation of [...expectations]) {
      await expectCountryFields(expectation);
    }
  });
});
