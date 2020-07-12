
# array functions

[![PHP requirements](https://img.shields.io/packagist/php-v/chebur/array-functions.svg)](https://packagist.org/packages/chebur/array-functions "PHP requirements")
[![Latest version](https://img.shields.io/packagist/v/chebur/array-functions.svg)](https://packagist.org/packages/chebur/array-functions "Last version")
[![Total downloads](https://img.shields.io/packagist/dt/chebur/array-functions.svg)](https://packagist.org/packages/chebur/array-functions "Total downloads")
[![License](https://img.shields.io/packagist/l/chebur/array-functions.svg)](https://packagist.org/packages/chebur/array-functions "License")

## Installation
Require it with composer:
```bash
composer require chebur/array-functions
```

## TODO
- array_add(array $array,  ... $values);
- array_element(function($element): bool {}, array $array)

## Functions list
- [array_map_key](#array_map_key)
- [array_value_first](#array_value_first)
- [array_value_last](#array_value_last)
- [array_value](#array_value)
- [array_value_string](#array_value_string)
- [array_value_int](#array_value_int)
- [array_value_bool](#array_value_bool)
- [array_value_float](#array_value_float)
- [array_value_array](#array_value_array)

### array_map_key
Function works the practically the same as `array_map` but it applies the callback to the _KEYS_ of the given array.
```php
$array = [
    0 => 10,
    1 => 20,
    2 => 30,
];
$result = array_map_key(function($key, $value) {}, $array);
```
`print_r($result);` returns:
```
Array ( [11] => 10 [22] => 20 [33] => 30 )
```

### array_value_first
Function described in [PHP RFC](https://wiki.php.net/rfc/array_key_first_last) but was not accepted.  
Returns the first element of an array or `NULL` if an array is empty.

### array_value_last
Function described in [PHP RFC](https://wiki.php.net/rfc/array_key_first_last) but was not accepted.  
Returns the last element of an array or `NULL` if an array is empty.

### array_value
Returns element of an array by key otherwise null.

### array_value_string
Returns _ONLY STRING_ element of an array by key otherwise null.

### array_value_int
Returns _ONLY INTEGER_ element of an array by key otherwise null.

### array_value_bool
Returns _ONLY BOOL_ element of an array by key otherwise null.

### array_value_float
Returns _ONLY FLOAT_ element of an array by key otherwise null.

### array_value_array
Returns _ONLY ARRAY_ element of an array by key otherwise null.

## License
See [LICENSE](LICENSE).
