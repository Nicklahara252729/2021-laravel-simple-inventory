<?php

namespace App\Repositories\GudangAtk;

interface GudangAtkRepositories
{
    public function viewData(); 
    public function getData($id);
    public function deleteData($id);
    public function saveData(array $attributes);
    public function saveTakeOutData(array $attributes);
    public function saveRestock(array $attributes);
}