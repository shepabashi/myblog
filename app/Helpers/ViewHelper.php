<?php

if (!function_exists('markdown')) {
    /**
     * @param string $str
     * @param bool $line_break
     * @return string
     */
    function markdown($str, $line_break = true)
    {
        $parser = new \cebe\markdown\GithubMarkdown();

        if ($line_break) {
            $parser->enableNewlines = true;
        } else {
            $parser->enableNewlines = false;
        }

        return $parser->parse($str);
    }
}


if (!function_exists('removeMarkup')) {
    /**
     * @param string $str
     * @param string $allowable_tags
     * @param int $trim
     * @param string $trim_str
     * @return string
     */
    function removeMarkup($str, $allowable_tags = "", $trim = 0, $trim_str = "...")
    {
        $value = strip_tags($str, $allowable_tags);
        $value = str_replace(array("\r", "\n"), '', $value);
        if ($trim) {
            $value = mb_strimwidth($value, 0, $trim, $trim_str);
        }
        return $value;
    }
}


if (!function_exists('autoActiveLink')) {
    /**
     * @param $link
     * @param string $content
     * @param string $class_name
     * @param string $wrap_element
     * @return string
     */
    function autoActiveLink($link, $content = "", $class_name="active", $wrap_element = "li")
    {
        $currentRoute = request()->getPathInfo();

        $url = url($link);
        $tag = "<a href=\"$url\">$content</a>";

        $class = ($currentRoute == $link ? " class=\"$class_name\"" : "");
        $wrapped_tag = "<$wrap_element$class>$tag</$wrap_element>";

        return $wrapped_tag;
    }
}