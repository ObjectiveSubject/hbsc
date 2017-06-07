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
        $dt = \DateTime::createFromFormat( 'Ymd', $this->getField('event_start_date') );

        return $dt->format('j');
    }

    public function getDateMonth()
    {
        $dt = \DateTime::createFromFormat( 'Ymd', $this->getField('event_start_date') );

        return $dt->format('M');
    }

    public function getTerms()
    {
        return get_terms( $this->taxonomy, array(
            'hide_empty' => true
        ) );
    }    
}
?>