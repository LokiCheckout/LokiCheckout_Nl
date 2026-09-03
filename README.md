# LokiCheckout_Nl

<!-- badges.specs.start -->
![Magento version](https://img.shields.io/badge/Magento-2.4.6%20%7C%202.4.9-orange)
![PHP version](https://img.shields.io/badge/PHP-8.2%E2%80%938.5-777BB4)
![License](https://img.shields.io/badge/License-OSL--3.0-blue)
![Latest Version](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/badges/release.svg)
<!-- badges.specs.end -->


**This Magento 2 module is an add-on package for adding some settings that feel good for the Dutch market. Note that it is not required. It changes a couple of field labels and adds a grid layout `dutch_grid`. Both can also be defined in a custom project-specific module.**

## Installation
Install this package via composer:
```bash
composer require loki-checkout/magento2-nl
```

Next, enable this module:
```bash
bin/magento module:enable LokiCheckout_Nl
```

## CLI usage
This module adds a new CLI `loki-checkout:generate-regions:nl` that allows you to generate the Dutch provinces. Note that this is actually not too common in Dutch webshops.  

## Current status

<!-- badges.test.start -->
[![Static Tests](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=static-tests)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
[![Unit Tests](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=unit-tests)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
[![Integration Tests](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=integration-tests)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
[![Playwright](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=playwright)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
[![DI Compilation](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/badges/main/pipeline.svg?job=compile)](https://gitlab.yireo.com/loki-checkout/LokiCheckout_Nl/-/pipelines)
<!-- badges.test.end -->
