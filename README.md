# PHP settings

Client library for settings storage

## Usage for mutable scopes

```php

use App\Parameters;

$settings = Parameters::getInstance();
$settings->setProperty('prop', $value);

$prop = $settings->getProperty('prop');

 
```