<?php

namespace App\FileKit;

trait HelperFileKit
{
    /**
     * Append message validation to messages validation
     *
     * @param array $arrayMessages
     * @param $name
     * @param $value
     * @return void
     */
    protected function appendMessageValidation(array &$arrayMessages, $name, $value): void
    {
        $arrayMessages[$name] = $value;
    }

    protected function deleteMessageValidation(array &$arrayMessages, $name): bool
    {
        if (array_key_exists($name, $arrayMessages)) {
            unset($arrayMessages[$name]);
            return true;
        }
        return false;
    }

    protected function getFolderName($namespace): string
    {
        return strtolower(class_basename(get_class(new $namespace))).'s' ;
    }
}
