# LokiCheckout_Nl

<!-- badges.specs.start -->
![Magento version](https://img.shields.io/badge/Magento-2.4.6%20%7C%202.4.9-orange)
![PHP version](https://img.shields.io/badge/PHP-8.2%E2%80%938.5-777BB4)
![License](https://img.shields.io/badge/License-OSL--3.0-blue)
![Latest Version](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/badges/release.svg)
<!-- badges.specs.end -->


**This Magento 2 module is an add-on package for adding some settings that feel good for the Dutch market. Note that it is not required. When the country `NL` is selected, it changes a couple of address field labels, adds a postcode placeholder and mask, narrows the housenumber and addition fields and adds a grid `netherlands` to the grid layout `default_grid`. All of this can also be defined in a custom project-specific module.**

## Installation
Install this package via composer:
```bash
composer require loki-checkout/magento2-nl
```

Next, enable this module:
```bash
bin/magento module:enable LokiCheckout_Nl
```

## Dutch provinces
To generate the Dutch provinces as regions, use the separate module `LokiCheckout_NlRegion`. Note that this is actually not too common in Dutch webshops.

## Current status

<!-- badges.test.start -->
[![Static Tests](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=static-tests)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
[![Unit Tests](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=unit-tests)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
[![Integration Tests](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=integration-tests)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
[![Playwright](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=playwright)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
[![DI Compilation](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=compile)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
<!-- badges.test.end -->
