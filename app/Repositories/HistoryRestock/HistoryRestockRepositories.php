<?php

namespace App\Repositories\HistoryRestock;

interface HistoryRestockRepositories
{
    public function viewData(); 
    public function getData($id);
    public function saveData(array $attributes);
}