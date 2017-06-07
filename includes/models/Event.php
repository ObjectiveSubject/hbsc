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

    public function __construct()
    {
        $this->setFieldsList($this->fieldsList);
        $this->hydrateFieldsList();
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
}
?>