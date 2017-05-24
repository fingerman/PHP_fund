<?php


namespace Data\Cities;


class AllCitiesViewData
{
    /**
     * @var City[]|\Generator
     */
    private $cities;

    /**
     * @return City[]|\Generator
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param callable $callable
     */
    public function setCities(callable $callable)
    {
        $generator = $callable();
        $this->cities = $generator;
    }

    public function addCity(City $city)
    {
        $this->cities[] = $city;
    }
}