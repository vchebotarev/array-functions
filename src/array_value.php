<?php

if (!function_exists('array_value')) {
    function array_value($key, array $array, $default = null)
    {
        return $array[$key] ?? $default;
    }
}

if (!function_exists('array_value_string')) {
    function array_value_string($key, array $array, ?string $default = null): ?string
    {
        if (!array_key_exists($key, $array)) {
            return $default;
        }
        if (!is_string($array[$key])) {
            return $default;
        }

        return $array[$key];
    }
}

if (!function_exists('array_value_int')) {
    function array_value_int($key, array $array, ?int $default = null): ?int
    {
        if (!array_key_exists($key, $array)) {
            return $default;
        }
        if (!is_int($array[$key])) {
            return $default;
        }

        return $array[$key];
    }
}

if (!function_exists('array_value_bool')) {
    function array_value_bool($key, array $array, ?bool $default = null): ?bool
    {
        if (!array_key_exists($key, $array)) {
            return $default;
        }
        if (!is_bool($array[$key])) {
            return $default;
        }

        return $array[$key];
    }
}

if (!function_exists('array_value_float')) {
    function array_value_float($key, array $array, ?float $default = null): ?float
    {
        if (!array_key_exists($key, $array)) {
            return $default;
        }
        if (!is_int($array[$key]) && !is_float($array[$key])) {
            return $default;
        }

        return $array[$key];
    }
}

if (!function_exists('array_value_array')) {
    function array_value_array($key, array $array, ?array $default = null): ?array
    {
        if (!array_key_exists($key, $array)) {
            return $default;
        }
        if (!is_array($array[$key])) {
            return $default;
        }

        return $array[$key];
    }
}
