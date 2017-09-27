<?php

namespace Sjorsvanleeuwen\BootstrapComponents;

use Html;

class HtmlExtender
{
    /**
     * @param string $url
     * @param string $title
     * @param string $type
     * @param boolean $show_title
     * @param boolean $show_icon
     * @param array $attributes
     *
     * @return string
     */
    public function bsActionLink($url, $title, $type, $show_title = true, $show_icon = true, $attributes = [])
    {
        return Html::bsActionLink($url, $title, $type, $show_title, $show_icon, $attributes);
    }
}