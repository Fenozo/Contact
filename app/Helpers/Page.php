<?php

namespace App\Helpers;

class Page
{
	public static function page_title($title = '') 
	{
		$base_title = config('specific.app_name') . ' - Url Site';

		if ($title === '')	{
			return $base_title;
		} else {
			return $title . ' | '. $base_title;
		}

	}

	public static function set_active_route($route) 
	{
		return Route::is($route) ? 'active' : '';
	}
}

?>