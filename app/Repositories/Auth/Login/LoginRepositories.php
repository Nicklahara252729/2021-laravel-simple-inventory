<?php

namespace App\Repositories\Auth\Login;

interface LoginRepositories
{
    public function getUserByUsername($data); 
    public function prosesLogin(array $attributes);
}