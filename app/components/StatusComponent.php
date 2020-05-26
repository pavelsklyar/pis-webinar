<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\StatusTable;

class StatusComponent extends BaseComponent
{
    public function getAll()
    {
        $table = new StatusTable();

        $statuses = $table->get("*");

        if (!empty($statuses)) {
            return $statuses;
        }
        else {
            return null;
        }
    }
}