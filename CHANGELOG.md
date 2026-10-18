# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]
### Fixed
- Apply column widths of housenumber and addition for all skins, not only the `default` skin
- Require `LokiCheckout_Core` 2.7 or higher for the `*_shipping_address_country_*` and `*_billing_address_country_*` handles
- Add Dutch translation for `Province`
- Fix outdated README
- Use static data provider attribute in GridTest
- Require `LokiCheckout_Core` 2.7.4 or higher so that Dutch billing labels also show up for virtual orders
- Add integration test for mixed shipping and billing countries (billing grid `netherlands` with shipping `DE`)

## [2.0.12] - 01 June 2026
### Fixed
- Change column width on mobile
- Move region command to module `LokiCheckout_NlRegion`
- Apply mask for postcode
- Dynamically change labels and grid-settings if country is `NL`

## [2.0.11] - 15 May 2026
### Fixed
- Fix Symfony 7 console command compat

## [2.0.10] - 20 February 2026
### Fixed
- Fix wrong layout paths for blocks to add field labels

## [2.0.9] - 19 February 2026
### Fixed
- Fix integration test
- Update composer keywords

## [2.0.8] - 22 October 2025
### Fixed
- Remove int return type from Symfony commands for Symfony 5 compat
- Update README

## [2.0.7] - 16 September 2025
### Fixed
- Add integration test

## [2.0.6] - 29 August 2025
### Fixed
- Add CI files
- Replace yireo/opensearch with yireo/opensearch-dummy in Gitlab CI

## [2.0.5] - 26 August 2025
### Fixed
- 5566efc Add GitLab CI files

## [2.0.4] - 18 August 2025
### Fixed
- Lower requirements to PHP 8.1

## [2.0.3] - 15 August 2025
### Fixed
- Remove redundant XML attributes in loki_checkout.xm
- Move netherlands grid of default grid layout from core to here
- Add translation for street field labels

## [2.0.2] - 06 August 2025
### Fixed
- Lower PHP requirement to PHP 8.2+

## [2.0.1] - 01 August 2025
### Fixed
- Add translate attribute to various XML layout arguments

## [2.0.0] - 22 July 2025
### Fixed
- Bump `LokiCheckout_Core` to 2.0.0
- Rename PHP namespace from `Yireo_Loki*` to `Loki*`
- Rename composer package from `yireo/magento2-loki*` to `loki/magento2*`

## [1.0.0] - 17 May 2025
### Fixed
- Generate new MODULE.json with simple test count
- Allow PHP 8.4 in CI

## [0.0.7] - 25 April 2025
### Fixed
- Allow upgrading to LokiFieldComponents and LokiCheckout 1.0

## [0.0.6] - 16 April 2025
### Fixed
- Move `loki_checkout.xml` of Nl and PostcodeNl module to Demo module

## [0.0.5] - 08 April 2025
### Fixed
- Housekeeping changes

## [0.0.4] - 11 March 2025
### Fixed
- Move GridLayout from XML layout to config
- Remove default grid class

## [0.0.3] - 22 February 2025
### Fixed
- Update `loki_checkout.xml` grid CSS for mobile

## [0.0.2] - 22 February 2025
### Fixed
-  Change deps
-  Fix command
-  Add Dutch provincies to Magento anyway
-  Add proper README
-  Replace TODO.md with TODO.json

## [0.0.1] - 21 January 2025
- Initial release
