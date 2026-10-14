import {Field} from '@loki-checkout/checkout-objects';
import {setupCheckout} from '@loki/setup-checkout';
import {expect, test} from '@loki/test';
import coreConfig from '@loki-checkout/config';
import merge from '@loki/util/merge';

const labelText = (text: string): RegExp => {
  const escapedText = text.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
  return new RegExp('^\\s*' + escapedText + '\\s*\\*?\\s*$');
};

test.describe('country-switch', function () {
  test('should allow me to switch country', async function ({page, context}) {
    await setupCheckout(page, context, merge(coreConfig, {
      config: {
        'loki_checkout/fields/hide_region_when_optional': 0,
      }
    }));

    const countryField = new Field(page, 'shipping.country_id');
    const regionField = new Field(page, 'shipping.region');
    const regionLabel = regionField.getLabelLocator();
    const postcodeField = new Field(page, 'shipping.postcode');
    const postcodeLabel = postcodeField.getLabelLocator();

    async function expectCountryFields(
      {
        country,
        regionRole,
        regionLabelText,
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
      await expect(regionLabel).toHaveText(labelText(regionLabelText));

      if (postcodePlaceholder) {
        await expect(postcodeField.getLocator()).toHaveAttribute(
          'placeholder',
          postcodePlaceholder,
        );
      } else {
        await expect(postcodeField.getLocator()).not.toHaveAttribute(
          'placeholder');
      }

      await expect(postcodeLabel).toHaveText(labelText(postcodeLabelText));
    }

    const expectations = [
      {
        country: 'US',
        regionLabelText: 'State/Province',
        regionRole: 'combobox',
        postcodePlaceholder: false,
        postcodeLabelText: 'Zip/Postal Code',
      },
      {
        country: 'NL',
        regionLabelText: 'Province',
        regionRole: 'textbox',
        postcodePlaceholder: '1234 AA',
        postcodeLabelText: 'Postcode',
      },
      {
        country: 'DE',
        regionLabelText: 'State/Province',
        regionRole: 'combobox',
        postcodePlaceholder: false,
        postcodeLabelText: 'Zip/Postal Code',
      },
      {
        country: 'NL',
        regionLabelText: 'Province',
        regionRole: 'textbox',
        postcodePlaceholder: '1234 AA',
        postcodeLabelText: 'Postcode',
      },
      {
        country: 'US',
        regionLabelText: 'State/Province',
        regionRole: 'combobox',
        postcodePlaceholder: false,
        postcodeLabelText: 'Zip/Postal Code',
      },
      {
        country: 'DE',
        regionLabelText: 'State/Province',
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
