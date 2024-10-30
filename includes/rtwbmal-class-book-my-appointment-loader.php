<?php
/**
 * Register all actions and filters for the plugin
 *
 * @link       https://www.redefiningtheweb.com
 * @since      1.0.0
 *
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Rtwbmal_Book_My_Appointment
 * @subpackage Rtwbmal_Book_My_Appointment/includes
 * @author     RedefiningTheWeb <developer@redefiningtheweb.com>
 */
class Rtwbmal_Book_My_Appointment_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $rtwbmal_actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $rtwbmal_actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $rtwbmal_filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $rtwbmal_filters;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->rtwbmal_actions = array();
		$this->rtwbmal_filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $rtwbmal_hook             The name of the WordPress action that is being registered.
	 * @param    object               $rtwbmal_component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $rtwbmal_callback         The name of the function definition on the $rtwbmal_component.
	 * @param    int                  $rtwbmal_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $rtwbmal_accepted_args    Optional. The number of arguments that should be passed to the $rtwbmal_callback. Default is 1.
	 */
	public function rtwbmal_add_action( $rtwbmal_hook, $rtwbmal_component, $rtwbmal_callback, $rtwbmal_priority = 10, $rtwbmal_accepted_args = 1 ) {
		$this->rtwbmal_actions = $this->rtwbmal_add( $this->rtwbmal_actions, $rtwbmal_hook, $rtwbmal_component, $rtwbmal_callback, $rtwbmal_priority, $rtwbmal_accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $rtwbmal_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $rtwbmal_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $rtwbmal_callback         The name of the function definition on the $rtwbmal_component.
	 * @param    int                  $rtwbmal_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $rtwbmal_accepted_args    Optional. The number of arguments that should be passed to the $rtwbmal_callback. Default is 1
	 */
	public function rtwbmal_add_filter( $rtwbmal_hook, $rtwbmal_component, $rtwbmal_callback, $rtwbmal_priority = 10, $rtwbmal_accepted_args = 1 ) {
		$this->rtwbmal_filters = $this->rtwbmal_add( $this->rtwbmal_filters, $rtwbmal_hook, $rtwbmal_component, $rtwbmal_callback, $rtwbmal_priority, $rtwbmal_accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $rtwbmal_hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $rtwbmal_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $rtwbmal_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $rtwbmal_callback         The name of the function definition on the $component.
	 * @param    int                  $rtwbmal_priority         The priority at which the function should be fired.
	 * @param    int                  $rtwbmal_accepted_args    The number of arguments that should be passed to the $rtwbmal_callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function rtwbmal_add( $rtwbmal_hooks, $rtwbmal_hook, $rtwbmal_component, $rtwbmal_callback, $rtwbmal_priority, $rtwbmal_accepted_args ) {

		$rtwbmal_hooks[] = array(
			'hook'          => $rtwbmal_hook,
			'component'     => $rtwbmal_component,
			'callback'      => $rtwbmal_callback,
			'priority'      => $rtwbmal_priority,
			'accepted_args' => $rtwbmal_accepted_args
		);

		return $rtwbmal_hooks;

	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function rtwbmal_run() {

		foreach ( $this->rtwbmal_filters as $rtwbmal_hook ) {
			add_filter( $rtwbmal_hook['hook'], array( $rtwbmal_hook['component'], $rtwbmal_hook['callback'] ), $rtwbmal_hook['priority'], $rtwbmal_hook['accepted_args'] );
		}

		foreach ( $this->rtwbmal_actions as $rtwbmal_hook ) {
			add_action( $rtwbmal_hook['hook'], array( $rtwbmal_hook['component'], $rtwbmal_hook['callback'] ), $rtwbmal_hook['priority'], $rtwbmal_hook['accepted_args'] );
		}

	}

}