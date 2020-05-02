<?php
// hide update notifications

add_filter('pre_site_transient_update_core',function () {
	global $wp_version;
	return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
});
