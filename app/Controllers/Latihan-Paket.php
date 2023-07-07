<?php

namespace App\Controllers;

use App\Models\UserMDL;
use App\Models\LoginMDL;
use App\Models\SoalMDL;
use App\Models\JawabanMDL;
use App\Models\LatihanMDL;

class Delete extends BaseController
{
    protected $userModel, $loginModel, $soalModel, $jawabanModel, $latihanModel;

    public function __construct()
    {
        $this->userModel = new UserMDL();
        $this->loginModel = new LoginMDL();
        $this->soalModel = new SoalMDL();
        $this->jawabanModel = new JawabanMDL();
        $this->latihanModel = new LatihanMDL();
    }

    public function index()
    {
          
    }
}