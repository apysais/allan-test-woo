<?php
namespace AllanTest;

/**
 * Singleton Pattern.
 *
 * Use to instantiate a class.
 *
 * @author allan.paul.casilum
 */
trait Single_Instance_Trait {
    
    /**
     * Create a global way to get the instance.
     * 
     */
    protected static $instance = null;

    /**
     * Use to hold the instance of the class.
     */
    public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}