<?php
function humanizeDate( $dateStr = null )
{
    if( null === $dateStr )
    {
        return '';
    }

    $dt = \DateTime::createFromFormat( 'Y-m-d', $dateStr );

    return $dt->format('F, jS Y');
}

function isDateOlderThanNow( $dateStr )
{
    $nowStr = sprintf("%d-%d-%d 00:00:00", date('Y'), date('m'), date('d'));
    $now    = new \DateTime($nowStr);
    $dt     = new \DateTime($dateStr);

    return $dt < $now ;
}
?>