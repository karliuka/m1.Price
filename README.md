# Magento Rounding Price

Rounding Price to Prettier Value for Multi-Currency Stores.

## Compatibility

Magento CE(EE) 1.6.x, 1.7.x, 1.8.x, 1.9.x

OpenMage LTS 19.x

[Price from Magento2](https://github.com/karliuka/m2.Price)

#### Install via Composer

1. Go to installation folder

2. Enter following commands to install module:

    ```bash
    composer require faonni/magento-price
    ```
   Wait while dependencies are updated.

#### Manual Installation

1. Download the corresponding [latest version](https://github.com/karliuka/m1.Price/archive/1.2.3.zip)

2. Copy the unzip content to the {Magento root} folder

## Usage

### Configuration

*System -> Configuration -> General -> Currency Setup -> Price Options*

<img alt="Magento2 Rounding Price" src="https://karliuka.github.io/m1/roundpriceconvert/config.png" style="width:100%"/>

### Frontend
#### Base prices - US Dollar
<img alt="Magento2 Rounding Price" src="https://karliuka.github.io/m1/roundpriceconvert/base.png" style="width:100%"/>
#### Store prices - Euro
<img alt="Magento2 Rounding Price" src="https://karliuka.github.io/m1/roundpriceconvert/store.png" style="width:100%"/>
#### Store rounding prices - Round fractions down, precision is 0
<img alt="Magento2 Rounding Price" src="https://karliuka.github.io/m1/roundpriceconvert/floor-0.png" style="width:100%"/>
#### Store rounding prices - Round fractions down, precision is -1
<img alt="Magento2 Rounding Price" src="https://karliuka.github.io/m1/roundpriceconvert/floor-1.png" style="width:100%"/>
#### Store rounding prices - Round fractions down, precision is -1 and enabled Subtract Amount
<img alt="Magento2 Rounding Price" src="https://karliuka.github.io/m1/roundpriceconvert/floor-s.png" style="width:100%"/>
#### Store rounding prices - Round fractions down, precision is -1 and enabled Subtract Amount(negative)
<img alt="Magento2 Rounding Price" src="https://karliuka.github.io/m1/roundpriceconvert/floor-sn.png" style="width:100%"/>

## Uninstall

Pleace, create backup so you can recover the data at a later time.

#### Uninstall via Composer

1. Go to installation folder

2. Enter following commands to remove:

    ```bash
    composer remove faonni/magento-price
    ```
#### Manual Uninstall

1. Remove the folder {Magento root}/app/code/community/Faonni/Price
2. Remove the folder {Magento root}/app/design/frontend/base/default/template/faonni/price
3. Remove the file {Magento root}/app/design/frontend/base/default/layout/faonni/price.xml
3. Remove the file {Magento root}/app/design/adminhtml/default/default/layout/faonni/price.xml
4. Remove the file {Magento root}/app/etc/modules/Faonni_Price.xml
4. Remove the file {Magento root}/app/locale/en_US/Faonni_Price.csv
