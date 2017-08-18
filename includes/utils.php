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

function quoteValue($value)
{
    return sprintf("'%s'", $value);
}

function getMostViewsPosts( array $args = array())
{
    global $wpdb;

    $postTypes = array('post', 'page', 'event', 'people');
    
    if( !array_key_exists( 'post_type', $args ) )
    {
        $args['post_type'] = $postTypes;
    }

    $postTypesList = implode(',', array_map("quoteValue", $args['post_type']));

    $query = "SELECT DISTINCT W.ID, M.meta_value, W.post_date
            FROM wp_posts W
            LEFT JOIN wp_postmeta as M
            ON W.ID = M.post_id 
            AND M.meta_key = 'views_count'
            AND W.post_type in (%s)
            ORDER BY M.meta_value DESC, W.post_date DESC";

    $sql = sprintf($query, $postTypesList);

    $sql = "SELECT post.id as post_id, meta.meta_key, meta.meta_value FROM wp_posts as post LEFT JOIN wp_postmeta as meta ON post.id = meta.post_id";

    $results = $wpdb->get_results( $sql, OBJECT );

    return $results;
}

function getViewsCount($postID)
{
    $countKey = 'views_count';
    return (int) get_post_meta($postID, $countKey, true);
}

function incrementViewsCount($postID)
{
    $countKey = 'views_count';    
    $count    = (int) get_post_meta($postID, $countKey, true);
    $count++;

    if($count <= 1)
    {
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, $count);
    }
    else
    {
        update_post_meta($postID, $countKey, $count);
    }

    return $count;
}

function postUpdateViews( $post_id, $post, $update )
{
    $viewsCount = get_post_meta( $post_id, 'views_count', true );

    if( !$viewsCount )
    {
        incrementViewsCount($post_id);    
    }

    return;
}


function getHeaderMenuItemsFirstLevel()
{
    $footerNavList = array();
    $lastParentId = null;
    $lastParentChild = false;

    $menuLocations = get_nav_menu_locations();
    $menuID = $menuLocations['header'];
    $primaryNav = wp_get_nav_menu_items($menuID); 

    foreach( $primaryNav as $navItem )
    {
        if( $navItem->menu_item_parent == 0 )
        {
            $footerNavList[] = $navItem;
            $lastParentId = $navItem->ID;
            $lastParentChild = false;
        }

        if( $navItem->menu_item_parent == $lastParentId && $lastParentChild == false )
        {
            $lastParentChild = true;
            $lastIndex = count($footerNavList) - 1;
            $lastIndex = ( $lastIndex < 0 ? 0 : $lastIndex );

            if( empty( $footerNavList[$lastIndex]->url ) || $footerNavList[$lastIndex]->url == '#' )
            {
                $footerNavList[$lastIndex]->url = $navItem->url;
            }
        }
    }

    return $footerNavList;
}

function shortText($text, $maxLen=150)
{
    $text = str_replace('  ', ' ', $text);
    $textList = explode(' ', $text);

    $shortText = '';

    foreach( $textList as $chunk )
    {
            $newLen = mb_strlen($chunk) + mb_strlen($shortText);

            if( $newLen <= $maxLen )
            {
                    $shortText .= ' ' . $chunk;
            }
    }

    return trim($shortText) . '[...]';
}
?>