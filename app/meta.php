<?php
namespace App;

if(count(get_included_files()) == 1) exit("No direct script access allowed");

class meta
{

	public function verify_license(){
		return true;

	}

}
