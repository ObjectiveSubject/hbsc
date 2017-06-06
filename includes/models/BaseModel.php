<?php
abstract class BaseModel
{
    private $taxonomy;
    private $fieldsList = array();
    private $fields = array();

    public function setFieldsList($fieldsList)
    {
        $this->fieldsList = $fieldsList;
    }

    public function getFieldsList()
    {
        return $this->fieldsList;
    }

    public function addField( $field )
    {
        if( !in_array( $field ) )
        {
            $this->fieldsList[] = $field;
        }
    }

    public function setField($fieldName, $value)  
    {
        $this->fields[ $fieldName ] = $value;
    }

    public function getField($fieldName, $value)
    {
        if( !array_key_exists($fieldName, $this->fields) )
        {
            return null;
        }

        return $this->fields[$fieldName];
    }

    public function hydrateFieldsList()
    {
        foreach( $this->fieldsList as $fieldName )
        {
            $field = get_post_custom_values($fieldName);

            if( null !== $field && is_array( $field ) )
            {
                $this->setField($fieldName, $field[ 0 ]);
            }
        }
    }

    public function formatDate( $dateStr = null )
    {
        if( null === $dateStr )
        {
            return '';
        }

        $dt = \DateTime::createFromFormat( 'Ymd', $dateStr );

        return $dt->format('F, jS Y');        
    }

    public function getTerms()
    {
        return get_terms( $this->taxonomy, array(
            'hide_empty' => true,
        ) );
    }    
}
?>