<?php

namespace App\Repositories\Barang;

interface BarangRepositories
{
    public function viewData(); 
    public function getData($id);
    public function deleteData($id);
    public function saveData(array $attributes);
}