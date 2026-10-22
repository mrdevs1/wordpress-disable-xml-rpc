<?php
/**
 * Disable XML-RPC methods in WordPress.
 *
 * @package WordPress
 */

add_filter( 'xmlrpc_enabled', '__return_false' );
