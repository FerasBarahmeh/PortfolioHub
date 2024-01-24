@props([
    'name' => 'fields'
])
<x-select-option :value="$field->id" :selected="old($name) == $field->id">{{ $field->name }}</x-select-option>
