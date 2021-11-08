<?php

namespace App\Repositories\User;

interface UserRepositories
{
    public function viewData(); 
    public function getData($id);
    public function deleteData($id);
    public function saveData(array $attributes);
}