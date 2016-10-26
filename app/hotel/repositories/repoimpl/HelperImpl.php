<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/4/2016
 * Time: 11:31 AM
 */

namespace App\hotel\repositories\repoimpl;


use App\prescription\repositories\repointerface\HelperInterface;
use App\prescription\utilities\HHSCache\CacheService;
use App\prescription\utilities\ErrorEnum\ErrorEnum;
use App\prescription\utilities\Exception\HelperException;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\QueryException;
use Exception;

class HelperImpl implements HelperInterface
{

    /* Get all the countries
     * @params none
     * @throws HelperException
     * @return array | null
     * @author Vimal
     */

    public function getCountries()
    {
        $cities = null;

        try
        {
            if (!CacheService::isCached("COUNTRIES_LIST"))
            {

                $query = DB::table('countries as c')->select('c.id', 'c.city_name', 'c.country as country_id', 'c.city_status');
                $query->where('c.city_status', '=', 1);
                $query->orderBy('c.city_name', 'asc');

                $countries = $query->get();

                if (!empty($cities))
                {
                    CacheService::addToCache('COUNTRIES_LIST', $countries);
                }

            }
            else
            {
                $countries = CacheService::getFromCache('COUNTRIES_LIST');
            }

        }
        catch (QueryException $queryEx)
        {
            throw new HelperException(null, ErrorEnum::COUNTRIES_LIST_ERROR, $queryEx);
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
            if (!CacheService::isCached("CITIES_LIST"))
            {

                $query = DB::table('cities as c')->select('c.id', 'c.city_name', 'c.country as country_id', 'c.city_status');
                $query->where('c.city_status', '=', 1);
                $query->orderBy('c.city_name', 'asc');

                $cities = $query->get();

                if (!empty($cities))
                {
                    CacheService::addToCache('CITIES_LIST', $cities);
                }

            }
            else
            {
                $cities = CacheService::getFromCache('CITIES_LIST');
            }

        }
        catch (QueryException $queryEx)
        {
            throw new HelperException(null, ErrorEnum::CITIES_LIST_ERROR, $queryEx);
        }
        catch (Exception $ex) {
            throw new HelperException(null, ErrorEnum::CITIES_LIST_ERROR, $ex);
        }

        return $cities;
    }
}