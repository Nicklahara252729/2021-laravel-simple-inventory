<?php

use Illuminate\Support\Facades\Session;

function checkUser()
{
    if (!Session::has('id_user')) :
        return redirect('/');
    endif;
}
