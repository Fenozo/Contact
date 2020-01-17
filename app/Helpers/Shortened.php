<?php
namespace App\Helpers;
use App\Models\Url;

class Shortened {

	public static function getUniqueShortUrl()
	{
		$shortened = str_random(5);

		if (Url::whereShortened($shortened)->count() > 0) {
			return self::getUniqueShortUrl();
		}

		return $shortened;
	}
}


?>