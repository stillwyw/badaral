<?php
class NoteLinkHelper extends AppHelper {
	

	function editLink($noteId,$uid,$cuid){
		if($cuid && ($cuid==$uid)){
				return "notes/edit/{$noteId}";
			}else{
				return 'no access!';
			}
	}
	
}
?>