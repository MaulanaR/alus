<?php

/**
 * Generate HTML for multi-dimensional menu from MySQL database
 * with ONE QUERY and WITHOUT RECURSION 
 * @author J. Bruni
 */
class MenuBuilder
{
	/**
	 * MySQL connection
	 */
	var $conn;
	
	/**
	 * Menu items
	 */
	var $items = array();
	
	/**
	 * HTML contents
	 */
	var $html  = array();
	
	/**
	 * Create MySQL connection
	 */
	function MenuBuilder()
	{
		$this->conn = mysql_connect( 'localhost', 'user', 'pass' );
		mysql_select_db( 'example', $this->conn );
	}
	
	/**
	 * Perform MySQL query and return all results
	 */
	function fetch_assoc_all( $sql )
	{
		$result = mysql_query( $sql, $this->conn );
		
		if ( !$result )
			return false;
		
		$assoc_all = array();
		
		while( $fetch = mysql_fetch_assoc( $result ) )
			$assoc_all[] = $fetch;
		
		mysql_free_result( $result );
		
		return $assoc_all;
	}
	
	/**
	 * Get all menu items from database
	 */
	function get_menu_items()
	{
		// Change the field names and the table name in the query below to match tour needs
		$sql = 'SELECT menu_id, menu_parent, menu_nama, menu_uri, order_menu FROM alus_menu_group ORDER BY menu_parent, order_menu;';
		foreach ($sql->result_array() as $key) {
		 	$assoc_all[] = $key;
		 } 
		return $assoc_all;
	}
	
	/**
	 * Build the HTML for the menu 
	 */
	function get_menu_html( $root_menu_id = 0 )
	{
		$this->html  = array();
		$this->items = $this->get_menu_items();
		
		foreach ( $this->items as $item )
			$children[$item['menu_parent']][] = $item;
		
		// loop will be false if the root has no children (i.e., an empty menu!)
		$loop = !empty( $children[$root_menu_id] );
		
		// initializing $parent as the root
		$parent = $root_menu_id;
		$parent_stack = array();
		
		// HTML wrapper for the menu (open)
		$this->html[] = '<ul>';
		
		while ( $loop && ( ( $option = each( $children[$parent] ) ) || ( $parent > $root_menu_id ) ) )
		{
			if ( $option === false )
			{
				$parent = array_pop( $parent_stack );
				
				// HTML for menu item containing childrens (close)
				$this->html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 ) . '</ul>';
				$this->html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ) . '</li>';
			}
			elseif ( !empty( $children[$option['value']['menu_id']] ) )
			{
				$tab = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 );
				
				// HTML for menu item containing childrens (open)
				$this->html[] = sprintf(
					'%1$s<li><a href="%2$s">%3$s</a>',
					$tab,   // %1$s = tabulation
					$option['value']['menu_uri'],   // %2$s = menu_uri (URL)
					$option['value']['menu_nama']   // %3$s = menu_nama
				); 
				$this->html[] = $tab . "\t" . '<ul class="submenu">';
				
				array_push( $parent_stack, $option['value']['menu_parent'] );
				$parent = $option['value']['menu_id'];
			}
			else
				// HTML for menu item with no children (aka "leaf") 
				$this->html[] = sprintf(
					'%1$s<li><a href="%2$s">%3$s</a></li>',
					str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ),   // %1$s = tabulation
					$option['value']['menu_uri'],   // %2$s = menu_uri (URL)
					$option['value']['menu_nama']   // %3$s = menu_nama
				);
		}
		
		// HTML wrapper for the menu (close)
		$this->html[] = '</ul>';
		
		return implode( "\r\n", $this->html );
	}
}

echo '<pre>' . htmlentities( $menu->get_menu_html() ) . '</pŕe>';