<?php
class Helper{

	public static function userDefaultImage(){
	return asset('frontend/img/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg');
	}

}

//settings
if (!function_exists('get_settings')) {
	function get_settings($key){
		return \App\Models\Settings::value($key);
	}
}
