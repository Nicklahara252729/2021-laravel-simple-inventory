<?php

namespace App\Repositories\History;

interface HistoryRepositories
{
    public function viewData(); 
    public function getData($id);
    public function saveData(array $attributes);
}