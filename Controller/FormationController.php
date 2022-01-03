<?php

require_once '../Controller/Controller.php';
require_once '../Model/FormationModel.php';
require_once '../DAO/FormationDAO.php';

class FormationController extends Controller
{

    public static function index()
    {
        $dao = new FormationDAO();
        $formations = $dao->getAll();
        include_once '../View/Formation/index.php';
    }

    public static function create()
    {
        // TODO: Implement create() method.
    }

    public static function store()
    {
        // TODO: Implement store() method.
    }

    public static function update()
    {
        // TODO: Implement update() method.
    }

    public static function delete()
    {
        // TODO: Implement delete() method.
    }
}