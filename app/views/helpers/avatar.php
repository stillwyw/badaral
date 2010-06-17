<?php
class AvatarHelper extends AppHelper {
	public function show($id=null,$type=null)
	{
		switch ($type) {
			case 'u':
				if (is_null($id)) {
					return "<img src='' >";
				}else{
					return "<img src='/u_thumb/u_".$id.".jpg' >";
				}
				break;
			case 'g':
				if (is_null($id)) {
					return "<img src='' >";
				}else{
					return "<img src='/g_thumb/e_".$id.".jpg' >";
				}
				break;			
			case 'e':
				if (is_null($id)) {
					return "<img src='' >";
				}else{
					return "<img src='/e_thumb/e_".$id.".jpg' >";
				}
				break;			
			default:
				if (is_null($id)) {
					return "<img src='' >";
				}else{
					return "<img src='/u_thumb/u_".$id.".jpg' >";
				}
				break;
		}

	}
	
	
}
?>