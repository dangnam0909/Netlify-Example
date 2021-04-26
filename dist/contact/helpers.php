<?php
	function is_email($str) {
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}

	function get_config($key, $default=null){
		$config = explode(".", $key);
		if(!isset($config[1])) return $default;
		global ${$config[0]};
		return isset(${$config[0]}[$config[1]])?${$config[0]}[$config[1]]:$default;
	}

    function config($key, $default=null){
    	echo get_config($key,$default);
	}

	function redirect($to,$method="GET"){
    	if($method!="POST"):
    		header("Location: {$to}");
    	else:
    	?>
    		<form id="redirect-form" action="<?php echo $to;?>" method="POST">
				<input type="hidden" name="token" value="<?php config("mail.token");?>">
			</form>
			<script type="text/javascript">
			    document.getElementById('redirect-form').submit();
			</script>
		<?php 
    	endif;
	}

	function get_selected($data,$value){
		if($data===$value){
			echo "selected";	
		}
	}
	function get_checked($data,$value){
		if($data===$value){
			echo "checked";	
		}
	}
	function get_checked_list($data,$value){
		if ($data == null){
			return false;
		}
		else{
			if(in_array($value,$data,false)){
				echo "checked";	
			}
		}
	}

	function get_focus($value){
		if(!empty($value)) {
			echo "autofocus";
		} 
	}