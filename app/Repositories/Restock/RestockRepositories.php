<?php

namespace App\Repositories\Restock;

interface RestockRepositories
{
    public function viewData(); 
    public function getData($id);
    public function deleteData($id);
    public function saveData(array $attributes);
}