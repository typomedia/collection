# Basic Collection Class

Ease of use collection class.

The Library is [PSR-1](https://www.php-fig.org/psr/psr-1/), [PSR-4](https://www.php-fig.org/psr/psr-4/), [PSR-12](https://www.php-fig.org/psr/psr-12/) compliant.

## Requirements

- `>= PHP 7.2`

## Dependencies

- `none`

## Install

```
composer require typomedia/collection
```

## Usage

```php
use Typomedia\Collection\Collection;

$data = [
    'Moretti' => [
        'name' => 'Style Ale',
        'style' => 'European Amber Lager',
        'alcohol' => '9.1%'
    ]
];

$collection = new Collection();
$key = md5(serialize($data));

$collection->set((object)$data, $key);
$collection->get($key);
$collection->first();
$collection->last();
$collection->keys();
$collection->find('name', 'Style Ale');
$collection->delete($key);
```