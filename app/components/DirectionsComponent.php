<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\DirectionsTable;
use app\database\FacultiesTable;
use app\model\Direction;

class DirectionsComponent extends BaseComponent
{
    private $table;

    public function __construct()
    {
        $this->table = new DirectionsTable();
    }

    public function getAll()
    {
        $directions = $this->table->get("*");

        if (empty($directions)) {
            return null;
        }
        else {
            $facultiesTable = new FacultiesTable();
            foreach ($directions as $key => $direction) {
                $faculty = $facultiesTable->get("*", ['id' => $direction['faculty_id']]);
                $directions[$key]['faculty_name'] = $faculty[0]['name'];
            }

            return $directions;
        }
    }

    public function getById($id)
    {
        $faculties = $this->table->get("*", ['id' => $id]);

        if (empty($faculties)) {
            return null;
        }
        else {
            return $faculties[0];
        }
    }

    public function add($code, $name, $faculty_id)
    {
        $facultiesTable = new FacultiesTable();

        if (!empty($facultiesTable->get("*", ['id' => $faculty_id]))) {
            $direction = new Direction($code, $name, $faculty_id);

            $add = $this->table->insert($direction);

            if (!is_array($add)) {
                return true;
            }
            else {
                return $add[0] . " " . $add[2];
            }
        }
        else {
            return "Такого факультета нет";
        }
    }
}