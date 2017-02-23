<?php
	ini_set('error_log', WP_CONTENT_DIR . '/debug.log');

	function debugLog($message) {
		$trace = debug_backtrace();
		$file = basename($trace[0]['file']);
		$line = $trace[0]['line'];

		if ( is_array($message) || is_object($message) ) {
			error_log('[' . $file . ':' . $line . '] ' . print_r($message, true));
		} else {
			error_log('[' . $file . ':' . $line . '] ' . $message);
		}
	}
?>