# LokiCheckout_Nl

**This is an add-on package for adding some settings that feel good for the Dutch market. Note that it is not required. It changes a couple of field labels and adds a grid layout `dutch_grid`. Both can also be defined in a custom project-specific module.**

## Installation
Install this package via composer (assuming you have setup the `composer.yireo.com` repository correctly already):
```bash
composer require loki-checkout/magento2-nl
```

Next, enable this module:
```bash
bin/magento module:enable LokiCheckout_Nl
```

## CLI usage
This module adds a new CLI `loki-checkout:generate-regions:nl` that allows you to generate the Dutch provinces. Note that this is actually not too common in Dutch webshops.  
