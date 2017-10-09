<?php

namespace Sjorsvanleeuwen\BootstrapComponents;

class HtmlBuilder extends \Collective\Html\HtmlBuilder
{
    /**
     * Build a single attribute element.
     *
     * @param string $key
     * @param string $value
     *
     * @return string
     */
    protected function attributeElement($key, $value)
    {
        // For numeric keys we will assume that the value is a boolean attribute
        // where the presence of the attribute represents a true value and the
        // absence represents a false value.
        // This will convert HTML attributes such as "required" to a correct
        // form instead of using incorrect numerics.
        if (is_numeric($key)) {
            return $value;
        }

        // Treat boolean attributes as HTML properties
        if (is_bool($value) && $key != 'value') {
            return $value ? $key : '';
        }

        // handle edge cases for array_merge_recursive
        if(is_array($value))
        {
            $value = implode(' ', $value);
        }

        if (! is_null($value)) {
            return $key . '="' . e($value) . '"';
        }
    }
}