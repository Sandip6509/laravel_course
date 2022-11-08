<?php

use Carbon\Carbon;

    function formatDate($date, $format = 'd-m-Y h:i A')
    {
        if(!empty($date)){
            return Carbon::parse($date)->format($format);
        }

        return null;
    }

    function getFileUrl($filename, $directory = 'profile'){
        return url('Storage/' . $directory . '/' . $filename);
    }

    function getDatesBetweenGivenDate($startDate, $endDate){
        $period = new \DatePeriod(
            new \DateTime($startDate),
            new \DateInterval('P1D'),
            new \DateTime($endDate)
        );
        $dates = [];
        foreach ($period as $key => $value) {
            $dates[] = $value->format('Y-m-d');
        }
        return $dates;
    }
?>
