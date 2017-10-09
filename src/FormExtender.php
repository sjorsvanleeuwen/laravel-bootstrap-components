<?php

namespace Sjorsvanleeuwen\BootstrapComponents;

use Form;

class FormExtender
{
    /**
     * @param string $name
     * @param string|null $label
     * @param mixed $value
     * @param array $attributes
     *
     * @return string
     */
    public function bsInputText($name, $label = null, $value = null, $attributes = [])
    {
        return Form::bsInputText($name, $label, $value, $attributes);
    }

    /**
     * @param string $name
     * @param string|null $label
     * @param mixed $value
     * @param array $attributes
     *
     * @return string
     */
    public function bsInputEmail($name, $label = null, $value = null, $attributes = [])
    {
        return Form::bsInputEmail($name, $label, $value, $attributes);
    }

    /**
     * @param string $name
     * @param string|null $label
     * @param mixed $value
     * @param boolean|null $checked
     * @param array $attributes
     *
     * @return string
     */
    public function bsInputCheckbox($name, $label = null, $value = 1, $checked = null, $attributes = [])
    {
        return Form::bsInputCheckbox($name, $label, $value, $checked, $attributes);
    }

    /**
     * @param string $name
     * @param string|null $label
     * @param array $attributes
     *
     * @return string
     */
    public function bsInputPassword($name, $label = null, $attributes = [])
    {
        return Form::bsInputEmail($name, $label, $attributes);
    }

    /**
     * @param string $name
     * @param string|null $label
     * @param array $options
     * @param mixed $value
     * @param array $attributes
     * @param array $optionAttributes
     *
     * @return string
     */
    public function bsInputSelect($name, $label = null, $options = [], $value = null, $attributes = [], $optionAttributes = [])
    {
        return Form::bsInputSelect($name, $label, $options, $value, $attributes, $optionAttributes);
    }

    /**
     * @param string $name
     * @param string|null $label
     * @param int $min
     * @param int $max
     * @param mixed $value
     * @param array $attributes
     *
     * @return string
     */
    public function bsInputRange($name, $label = null, $min = 0, $max = 100, $value = null, $attributes = [])
    {
        return Form::bsInputRange($name, $label, $min, $max, $value, $attributes);
    }

    /**
     * @param string $label
     * @param mixed $value
     *
     * @return string
     */
    public function bsInputStatic($label, $value)
    {
        return Form::bsInputStatic($label, $value);
    }

    /**
     * @param string $cancelUrl
     *
     * @return string
     */
    public function bsFormActionButtons($cancelUrl)
    {
        return Form::bsFormActionButtons($cancelUrl);
    }
}