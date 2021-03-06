<?php

namespace Lib;

/**
 * Class Entity
 * @package Lib
 */
abstract class Entity
{
    /**
     * @var Database
     */
    protected $database;

    /**
     * Entity constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * @param $_post
     */
    public function hydrate($_post)
    {
        foreach ($_post as $property => $value) {
            $this->{$property} = $value;
        }
    }

    /**
     * @return array
     */
    public function valid()
    {
        $errors = [];
        foreach ($this->metadata["columns"] as $column => $validation) {
            if($validation["required"] && $this->{$column} == "") {
                $errors[$column] = $validation["message"];
            }
        }
        return $errors;
    }

    /**
     * @return mixed
     */
    public abstract static function getTable();
}