<?php

class Hotel {

    private $id;
    private $name;
    private $rate;
    private $features;

    public function __construct($id, $name, $rate, $features) {

        $this->id = $id;
        $this->name = $name;
        $this->rate = $rate;
        $this->features = $features;
    }

    /**     * Get the value of id     */ 
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /** name */ 
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**     * Get the value of rate     */ 
    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**     * Get the value of features     */ 
    public function getFeatures()
    {
        return $this->features;
    }


    public function setFeatures($features)
    {
        $this->features = $features;

        return $this;
    }
}