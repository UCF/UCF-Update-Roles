<?php
/*
Plugin Name: UCF Update Roles
Description: Updates capabilities on non-super admins.
Version: 1.0.0
Author: UCF Web Communications
License: GPL3
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'ucf_update_roles_meta_cap' ) ) {
	/**
	 * Enable unfiltered_html capability for Editors and Administrators
	 * @param array  $caps    The user's capabilities.
	 * @param string $cap     The capability name.
	 * @param int    $user_id The user ID.
	 * @return array $caps    The user's capability with 'unfiltered_html' potentially added.
	 **/
	function ucf_update_roles_meta_cap( $caps, $cap, $user_id ) {
		if ( 'unfiltered_html' === $cap && user_can( $user_id, 'editor' ) ) {
			$caps = array( 'unfiltered_html' );
		}

		if ( 'unfiltered_html' === $cap && user_can( $user_id, 'administrator' ) ) {
			$caps = array( 'unfiltered_html' );
		}

		return $caps;
	}

	add_filter( 'map_meta_cap', 'ucf_update_roles_meta_cap', 1, 3 );
}
