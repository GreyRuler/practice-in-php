<?php
class FormHelper {
    protected $values = array();

    public function __construct($values = array()) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->values = $_POST;
        } else {
            $this->values = $values;
        }
    }

    public function label($text, $attributes = array()) {
        return $this->start('label', $attributes).
               $text."<br/>".
               $this->end('label');
    }

    public function input($type, $attributes = array(), $isMultiple = false) {
        $attributes['type'] = $type;
        if (($type == 'radio') || ($type == 'checkbox')) {
            if ($this->isOptionSelected($attributes['name']
                ?? null, $attributes['value'] ?? null)) {
                $attributes['checked'] = true;
            }
        }
        return $this->tag('input', $attributes, $isMultiple);
    }

    public function select($options, $attributes = array()) {
        $multiple = $attributes['multiple'] ?? false;
        return $this->start('select', $attributes, $multiple).
               $this->options($attributes['name'] ?? null, $options).
               $this->end('select');
    }

    public function textarea($attributes = array()) {
        $name = $attributes['name'] ?? null;
        $value = $this->values[$name] ?? '';
        return $this->start('textarea', $attributes).
                            htmlentities($value).
                            $this->end('textarea');
    }

    public function tag($tag, $attributes = array(), $isMultiple = false) {
        return "<$tag {$this->attributes($attributes, $isMultiple)} />";
    }

    public function start($tag, $attributes = array(), $isMultiple = false) {
        // Дескрипторы <select> и <textarea> не получают
        // атрибуты value
        $valueAttribute = (!(($tag == 'select')||($tag == 'textarea')));
        $attrs = $this->attributes($attributes, $isMultiple,
        $valueAttribute);
        return "<$tag $attrs>";
    }

    public function end($tag) {
        return "</$tag>";
    }

    protected function attributes($attributes, $isMultiple,
        $valueAttribute = true) {
        $tmp = array();
        // Если данный дескриптор может содержать атрибут value,
        // а его имени соответствует элемент в массиве значений,
        // то установить этот атрибут
        if ($valueAttribute && isset($attributes['name'])
            && array_key_exists($attributes['name'],
            $this->values)) {
            $attributes['value'] = $this->values[$attributes['name']];
        }
        foreach ($attributes as $k => $v) {
            // Истинное логическое значение означает
            // логический атрибут
            if (is_bool($v)) {
                if ($v) { $tmp[] = $this->encode($k); }
            }
            // иначе k = v
            else {
                $value = $this->encode($v);
                // Если это многозначный элемент, присоединить
                // квадратные скобки ([]) к его имени
                if ($isMultiple && ($k == 'name')) {
                    $value .= '[]';
                }
                $tmp[] = "$k=\"$value\"";
            }
        }
        return implode('', $tmp);
    }

    protected function options($name, $options) {
        $tmp = array();
        foreach ($options as $k => $v) {
            $s = "<option value=\"{$this->encode($k)}\"";
            if ($this->isOptionSelected($name, $k)) {
                $s .= ' selected';
            }
            $s .= ">{$this->encode($v)}</option>";
            $tmp[] = $s;
        }
        return implode('', $tmp);
    }

    protected function isOptionSelected($name, $value) {
        // Если для аргумента $name в массиве отсутствует
        // элемент, значит, этот элемент нельзя выбрать
        if (! isset($this->values[$name])) {
            return false;
        }
        // Если же для аргумента $name в массиве имеется
        // элемент, который сам является массивом, проверить,
        // находится значение аргумента $value в массиве
        else if (is_array($this->values[$name])) {
            return in_array($value, $this->values[$name]);
        }
        // А иначе сравнить значение аргумента $value с
        // элементом массива значений по значению аргумента $name
        else {
            return $value == $this->values[$name];
        }
    }

    public function encode($s) {
        return htmlentities($s);
    }
}
