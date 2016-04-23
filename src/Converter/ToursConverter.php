<?php

namespace vladimino\CHGKDB\Converter;

/**
 * Class ToursConverter
 * @package vladimino\CHGKDB\Convertor
 */
class ToursConverter
{
    /**
     * @param \SimpleXMLElement $rawTours
     *
     * @return array
     */
    public function getToursCollection($rawTours)
    {
        $toursCollection = [];

        foreach ($rawTours->tour as $rawTour) {
            $toursCollection[] = (array) $rawTour;
        }

        return $toursCollection;
    }

    /**
     * @param \SimpleXMLElement $rawTours
     *
     * @return array
     */
    public function getToursMeta($rawTours)
    {
        $meta = array_filter(
            (array) $rawTours,
            function ($k) {
                return $k !== 'tour';
            },
            ARRAY_FILTER_USE_KEY
        );

        $meta = array_map(
            function ($value) {
                return (string) $value;
            },
            $meta
        );

        return $meta;
    }
}
