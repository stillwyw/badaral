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
	public function userAvatar($user,$type=null)
	{
		$path = User::avatar_path;  # 返回格式是 'a_path'
	    $userPath = "/people/{$user['User']['uid']}";
	    if (is_null($user['User']['avatar'])	) {
	    	$avatar = 'default.jpg';
	    }else{
	    	$avatar = $user['User']['avatar'];
	    }
	    if (!is_null($type)) {
	    	list($file_name,$file_type)=explode('.',$avatar);
			$avatar = $file_name.'_'.$type.'.'.$file_type;
	    }
	    $imgPath  = "/{$path}/{$avatar}?".time();
	    return "<img src='{$imgPath}' >";		
	}
	public function userLink($user,$type=null)
	{
		$path = User::avatar_path;  # 返回格式是 'a_path'
	    $userPath = "/people/{$user['User']['uid']}";
	    if (is_null($user['User']['avatar'])	) {
	    	$avatar = 'default.jpg';
	    }else{
	    	$avatar = $user['User']['avatar'];
	    }
	    if (!is_null($type)) {
	    	list($file_name,$file_type)=explode('.',$avatar);
			$avatar = $file_name.'_'.$type.'.'.$file_type;
	    }
	    $imgPath  = "/{$path}/{$avatar}?".time();
	    return "<a href='{$userPath}' ><img src='{$imgPath}' ></a>";
	}
	public function groupAvatar($group,$type=null)
	{
		$path = Group::avatar_path;  # 返回格式是 'a_path'
	    $userPath = "/group/{$group['Group']['gid']}";
	    if (is_null($group['Group']['avatar'])	) {
	    	$avatar = 'default.jpg';
	    }else{
	    	$avatar = $group['Group']['avatar'];
	    }
	    if (!is_null($type)) {
	    	list($file_name,$file_type)=explode('.',$avatar);
			$avatar = $file_name.'_'.$type.'.'.$file_type;
	    }
	    $imgPath  = "/{$path}/{$avatar}?".time();
	    return "<img src='{$imgPath}' >";				
	}
	public function groupLink($group,$type=null)
	{
		$path = Group::avatar_path;  # 返回格式是 'a_path'
	    $groupPath = "/group/{$group['Group']['gid']}";
	    if (is_null($group['Group']['avatar'])	) {
	    	$avatar = 'default.jpg';
	    }else{
	    	$avatar = $group['Group']['avatar'];
	    }
	    if (!is_null($type)) {
	    	list($file_name,$file_type)=explode('.',$avatar);
			$avatar = $file_name.'_'.$type.'.'.$file_type;
	    }
	    $imgPath  = "/{$path}/{$avatar}?".time();
	    return "<a href='{$groupPath}' ><img src='{$imgPath}' ></a>";		
	}
	
}
?>