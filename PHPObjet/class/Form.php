<?php
class Form {

    public static $class = 'form-control';

    public static function checkbox(string $name, string $value = null, array $data = []): string {
        $attribut = '';
        if (isset($data[$name]) && in_array($value, $data[$name])) {
            $attribut .= ' checked';
        }
        $attribut = ' class="' . self::$class . '"';
        return <<<HTML
            <input type="checkbox" name="{$name}[]" value="$value" $attribut>
        HTML;
    }
    
    public static function radio(string $name, string $value, array $data): string {
        $attribut = '';
        $type = 'radio';
        if (isset($data[$name]) && $value === $data[$name]) {
            $attribut .= ' checked';
        }
        return <<<HTML
            <input type="$type" name="{$name}" value="$value" $attribut>
        HTML;
    }
}