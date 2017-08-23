<?php
class Event extends BaseModel
{
    private $taxonomy = 'event-type';
    private $fieldsList = array( 
        'event_start_date',
        'event_end_date',
        'event_doors_open',
        'event_program',
        'event_location',
        'event_discussion_leaders',
        'event_title_discussion_leaders',
        'event_display_discussions'
    );
	
	public $now;
	public $now_mktime;
	

    public function __construct()
    {
        $this->setFieldsList($this->fieldsList);
        $this->hydrateFieldsList();
		$this->now= date("Y-m-d");
		list($year, $month, $day) = explode('-', $this->now);
		$this->now_mktime=  mktime(0, 0, 0, $month, $day, $year);
    }

    public function getEventDateFormatted()
    {
        return $this->formatDate($this->getField('event_start_date'));
    }

    public function getDateDay()
    {
        return $this->getStartDate()->format('j');
    }

    public function getDateMonth()
    {
        return $this->getStartDate()->format('M');
    }

    public function getStartDate()
    {
        return \DateTime::createFromFormat( 'Ymd', $this->getField('event_start_date') );
    }

    public function getEndDate()
    {
        return \DateTime::createFromFormat( 'Ymd', $this->getField('event_start_date') );
    }    

    public function getTerms()
    {
        return get_terms( $this->taxonomy, array(
            'hide_empty' => true
        ) );
    }

	public function getRangeDates($format = 'Y-m-d') {
		$array = array();
		$interval = new DateInterval('P1D');

		$realEnd = new DateTime($this->getField('event_end_date'));
		$realEnd->add($interval);

		$period = new DatePeriod(new DateTime($this->getField('event_start_date')), $interval, $realEnd);

		foreach($period as $date) { 
			$array[] = $date->format($format); 
		}

		return $array;
	}
	
	public function isOldEvent() {
		$event_start_date= new DateTime($this->getField('event_start_date'));
		list($year, $month, $day) = explode('-', $event_start_date->format('Y-m-d'));
		$event_mktime= mktime(0, 0, 0, $month, $day, $year);
		return ($event_mktime < $this->now_mktime);
	}
}
?>