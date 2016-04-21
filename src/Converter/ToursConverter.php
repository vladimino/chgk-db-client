<?php

namespace vladimino\CHGKDB\Converter;

/**
 * Class ToursConverter
 * @package vladimino\CHGKDB\Convertor
 */
class ToursConverter
{
    /**
     * @var \SimpleXMLElement
     */
    private $rawTours;

    /**
     * ToursConverter constructor.
     *
     * @param \SimpleXMLElement $rawTours
     */
    public function __construct(\SimpleXMLElement $rawTours)
    {
        $this->rawTours = $rawTours;
    }

    /**
     * @return array
     */
    public function getToursCollection()
    {
        $toursCollection = [];

        foreach ($this->rawTours->tour as $rawTour) {
            $toursCollection[] = (array)$rawTour;
        }

        return $toursCollection;
    }
}
