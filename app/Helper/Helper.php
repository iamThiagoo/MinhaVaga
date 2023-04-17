<?php

namespace App\Helper;

use Carbon\Carbon;

class Helper
{

    /**
     * Creates a string that indicates the difference between data using only years and months
     *
     * @param string|integer $startDate
     * @param string|integer|null $endDate
     *
     * @return string
     */
    public static function diffYearsAndMonths ($startDate, $endDate = null) : string
    {
        $startDateFormat = Carbon::createFromFormat('Y-m-d', $startDate);
        $endDateFormat   = self::createFromFormatOrDefault($endDate);

        if ($startDateFormat->gt($endDateFormat)) 
            throw new \Exception('Data de início maior que a data final.');

        $diff = $startDateFormat->diff($endDateFormat);

        $yearTerm  = self::defineYearTerm($diff->y);
        $monthTerm = self::defineMonthTerm($diff->m);

        return $diff->y == 0 ? "{$diff->m} {$monthTerm}" : "{$diff->y} {$yearTerm} e {$diff->m} {$monthTerm}";
    }

    /**
     * Creates a Carbon object from a given date string, or returns the current date if none is provided.
     * 
     * @param string|null $date
     * 
     * @return Carbon
     */
    public static function createFromFormatOrDefault ($date = null) : Carbon 
    {
        return $date != null ? Carbon::createFromFormat('Y-m-d', $date) : Carbon::now();
    }


    /**
     * Returns the plural or singular of the word "year" in Portuguese
     * 
     * @param integer $years
     * 
     * @return string
     */
    public static function defineYearTerm (int $years) : string 
    {
        return $years <= 1 ? "ano" : "anos";
    }

    /**
     * Returns the plural or singular of the word "month" in Portuguese
     * 
     * @param integer $number
     * 
     * @return string
     */
    public static function defineMonthTerm (int $months) : string 
    {
        return $months <= 1 ? "mês" : "meses";
    }


    /**
     * Return the full language fluency term in a language, in Portuguese
     * 
     * @param string $fluency
     * 
     * @return string
     */
    public static function fluencyTerm (string $fluency) : string 
    {
        return match ($fluency) {
            'B' => 'Básico',        // Basic
            'I' => 'Intermidiário', // Intermediary
            'A' => 'Avançado',      // Advanced
            'F' => 'Fluente',       // Fluent
        };
    }

}