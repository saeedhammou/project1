<?php

namespace XTS\Modules\Header_Builder;

/**
 * ------------------------------------------------------------------------------------------------
 * Manage headers lists in the database. CRUD
 * ------------------------------------------------------------------------------------------------
 */
class Headers_List {
	/**
	 * Set default header.
	 *
	 * @param integer $id Header ID.
	 *
	 * @return void
	 */
	public function set_default( $id ) {
		update_option( 'whb_main_header', $id );
	}

	/**
	 * Get default header.
	 *
	 * @return integer
	 */
	public function get_default() {
		$id = get_option( 'whb_main_header' );

		if ( ! $id ) {
			$id = WOODMART_HB_DEFAULT_ID;
		}

		return $id;
	}

	/**
	 * Get all headers.
	 *
	 * @return array
	 */
	public function get_all() {
		$default_id = WOODMART_HB_DEFAULT_ID;

		$list = array(
			$default_id => array(
				'id'   => WOODMART_HB_DEFAULT_ID,
				'name' => WOODMART_HB_DEFAULT_NAME,
			),
		);

		$header = get_option( 'whb_' . $default_id );

		if ( isset( $header['name'] ) ) {
			$list[ $default_id ]['name'] = $header['name'];
		}

		$saved_headers = get_option( 'whb_saved_headers' );

		if ( ! empty( $saved_headers ) && is_array( $saved_headers ) ) {
			$list = array_merge( $list, $saved_headers );
		}

		return $list;
	}

	/**
	 * Add new header.
	 *
	 * @param integer $id Header ID.
	 * @param string  $name Header name.
	 *
	 * @return array|array[]
	 */
	public function add_header( $id = false, $name = false ) {
		$list = $this->get_all();

		$list[ $id ] = array(
			'id'   => $id,
			'name' => $name,
		);

		update_option( 'whb_saved_headers', $list );

		return $list;
	}

	/**
	 * Remove header.
	 *
	 * @param integer $id Header ID.
	 *
	 * @return array|array[]
	 */
	public function remove( $id ) {
		$list = $this->get_all();
		if ( isset( $list[ $id ] ) ) {
			unset( $list[ $id ] );
		}
		update_option( 'whb_saved_headers', $list );
		return $list;
	}

	/**
	 * Get example headers config.
	 *
	 * @return mixed
	 */
	public function get_examples() {
		return woodmart_get_config( 'header-examples' );
	}
}
