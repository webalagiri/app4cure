<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/4/2016
 * Time: 11:31 AM
 */

namespace App\hotel\repositories\repointerface;


interface HelperInterface
{
    public function getCountries();

    public function getCities();
}