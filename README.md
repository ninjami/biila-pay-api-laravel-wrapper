# Biila Pay API Laravel Wrapper

This package provides a streamlined access to the Biila Pay API within your Laravel project.

## Installation

Run the following command in the root folder of your Laravel project.

`composer require biila-pay/laravel-api-wrapper`

## Config values

**BIILA_PAY_API_TOKEN (required)**

Token that grants access to the API.

## Examples

### Get payment

```php
use BiilaPay\LaravelApiWrapper\Facades\BiilaPayApi;

$reservations = BiilaPayApi::getPayment('7eb726a0-2c1f-4c4a-b736-6aa46732a6d7')->json();
// OR
$reservations = BiilaPayApi::get('payment/7eb726a0-2c1f-4c4a-b736-6aa46732a6d7')->json();
```
