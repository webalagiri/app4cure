<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/4/2016
 * Time: 11:46 AM
 */

namespace App\hotel\services;

use App\hotel\utilities\Exception\HelperException;
use App\hotel\utilities\ErrorEnum\ErrorEnum;
use App\hotel\repositories\repointerface\HelperInterface;
use Exception;

class HelperService
{
    protected $helperRepo;

    public function __construct(HelperInterface $helperRepo) {
        $this->helperRepo = $helperRepo;
    }


    /* Get all the countries
     * @params none
     * @throws HelperException
     * @return array | null
     * @author Vimal
     */

    public function getCountries()
    {
        $countries = null;

        try
        {
            $countries = $this->helperRepo->getCountries();
        }
        catch(HelperException $countryExc)
        {
            throw $countryExc;
        }
        catch (Exception $ex) {
            throw new HelperException(null, ErrorEnum::COUNTRIES_LIST_ERROR, $ex);
        }
        return $countries;
    }

    /* Get all the cities
     * @params none
     * @throws HelperException
     * @return array | null
     * @author Vimal
     */

    public function getCities()
    {
        $cities = null;

        try
        {
            $cities = $this->helperRepo->getCities();
        }
        catch(HelperException $cityExc)
        {
            throw $cityExc;
        }
        catch (Exception $ex) {
            throw new HelperException(null, ErrorEnum::CITIES_LIST_ERROR, $ex);
        }
        return $cities;
    }
}