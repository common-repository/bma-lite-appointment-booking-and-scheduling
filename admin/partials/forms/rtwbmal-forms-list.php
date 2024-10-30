<?php
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Rtwbmal_Shortcodes extends WP_List_Table {

    /** Class constructor */
	public function __construct() {
		parent::__construct( [
			'singular' => __( 'Template', 'rtwbmal-book-my-appointment' ),
			'plural'   => __( 'Templates', 'rtwbmal-book-my-appointment' ),
			'ajax'     => false 

		] );
    }

    /**
     * Handles data query and filter, sorting, and pagination.
     */
    public function prepare_items() {

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $this->_column_headers = array($columns, $hidden, $sortable);
    
        /** Process bulk action */
        $this->process_bulk_action();
    
        $per_page     = $this->get_items_per_page( 'templates_per_page', 5 );
        $current_page = $this->get_pagenum();
        $total_items  = self::record_count();
    
        $this->set_pagination_args( [
            'total_items' => $total_items,
            'per_page'    => $per_page
        ] );
    
        $this->items = self::get_templates( $per_page, $current_page );
        
    }

    /**
     * Retrieve customer’s data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public static function get_templates( $per_page = 5, $page_number = 1 ) {

        global $wpdb;
        
        $sql = "SELECT * FROM {$wpdb->prefix}posts";
    
        if ( ! empty( $_REQUEST['orderby'] ) ) {
            $sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
            $sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
        }
    
        $sql .= " WHERE `post_type` = 'rtwbmal_shortcodes'";

        $sql .= " LIMIT $per_page";
    
        $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;
    
        $result = $wpdb->get_results( $sql, 'ARRAY_A' );
        
        return $result;
    }

    /**
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    public static function delete_template( $id ) {
        global $wpdb;
    
        $wpdb->delete(
            "{$wpdb->prefix}posts",
            [ 'ID' => $id ],
            [ '%d' ]
        );
    }
    
    /** Text displayed when no customer data is available */
    public function no_items() {
        _e( 'No Templates avaliable.', 'rtwbmal-book-my-appointment' );
    }


    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    function column_name( $item ) {

        $delete_nonce = wp_create_nonce( 'rtwbmal_delete_template' );
        $edit_nonce = wp_create_nonce( 'rtwbmal_edit_template' );
        
        $actions = [
            'delete' => sprintf( '<a href="?page=%s&action=%s&template=%s&_wpnonce=%s">Delete</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['ID'] ), $delete_nonce ),
            'edit' => sprintf( '<a href="?page=%s&action=%s&template=%s&_wpnonce=%s">Edit</a>', esc_attr( 'rtwbmal-template' ), 'edit', absint( $item['ID'] ), $edit_nonce )
        ];
    
        return $this->row_actions( $actions );
    }


    /**
     * Render a column when no column specific method exists.
     *
     * @param array $item
     * @param string $column_name
     *
     * @return mixed
     */
    public function column_default( $item, $column_name ) {
        
        switch ( $column_name ) {
            case 'id':
                return $item['ID'];
            case 'post_title':
                return $item[ $column_name ];
            case 'post_content':
                return '['.$item[ $column_name ].' id="'.$item['ID'].'"]';
            case 'post_date':
                return date('d-m-Y', strtotime($item[ $column_name ]));
            case 'action': 
                return $this->column_name($item);
        default:
            return print_r( $item, true );
        }
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    function column_cb( $item ) {
        return sprintf(
        '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['ID']
        );
    }

    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns() {
        $columns = [
            'cb'           => '<input type="checkbox" />',
            'id'           => __( 'ID', 'rtwbmal-book-my-appointment' ),
            'post_title'   => __( 'Title', 'rtwbmal-book-my-appointment' ),
            'post_content' => __( 'ShortCode', 'rtwbmal-book-my-appointment' ),
            'post_date'    => __( 'Created Date', 'rtwbmal-book-my-appointment' ),
            'action' => __( 'Action', 'rtwbmal-book-my-appointment' )
        ];
    
        return $columns;
    }

    /**
     * Columns to make sortable.
     *
     * @return array
     */
    public function get_sortable_columns() {
        $sortable_columns = array(
            'post_date' => array( 'post_date', false ),
            'post_title' => array( 'post_title', true ),
            'post_content' => array( 'post_content', false ),
            'action' => array( 'action', false )
        );
    
        return $sortable_columns;
    }
}