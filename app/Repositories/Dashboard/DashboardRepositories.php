<?php

namespace App\Repositories\Dashboard;

interface DashboardRepositories
{
    public function viewDataBarang($key); 
    public function viewDataHistory($key);
}