<?php

namespace App\Controllers;

use App\Models\Satker_model;

class LandingPage extends BaseController
{
    public function index()
    {
        return view("landingpage/index");
    }
}
