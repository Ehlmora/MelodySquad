<?php

abstract class Controller {

    abstract public static function index();
    abstract public static function create();
    abstract public static function store();
    abstract public static function update();
    abstract public static function delete();

}