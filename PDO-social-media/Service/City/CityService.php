<?php


namespace Service\City;


use Adapter\DatabaseInterface;
use Data\Cities\AllCitiesViewData;
use Data\Cities\City;
use Data\Cities\OneCityViewData;

class CityService
{
    /**
     * @var DatabaseInterface
     */
    private $db;


    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function getOneCity(): OneCityViewData
    {
        $stmt = $this->db->prepare("SELECT name FROM cities LIMIT 1");
        $stmt->execute();
        $city = $stmt->fetchObject(OneCityViewData::class);

        return $city;
    }

    public function getAll(): AllCitiesViewData
    {
        $data = new AllCitiesViewData();

        $stmt = $this->db->prepare("SELECT id, name FROM cities ORDER BY id");
        $stmt->execute();

        $callable = function() use ($stmt)
        {
            $i = 0;
            while ($city = $stmt->fetchObject(City::class)) {
                var_dump($i++);
                yield $city;
            }
        };
        $data->setCities($callable);
//
//        foreach ($stmt->fetchAll() as $cityArray) {
//            $cityObject = new City();
//            $cityObject->setId($cityArray['id']);
//            $cityObject->setName($cityArray['name']);
//
//            $data->addCity($cityObject);
//        }

        return $data;
    }
}