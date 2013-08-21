<?php  
App::uses('AppHelper', 'View/Helper');
class ElfinderHelper extends AppHelper {
	public $helpers = array('Js', 'Html');
	
	function loadLibs() {
		return $this->Html->css(array("/lib/elfinder/css/elfinder.min","/lib/elfinder/css/theme")).$this->Html->script(array("/lib/elfinder/js/elfinder.min","/lib/elfinder/js/i18n/elfinder.no","/lib/elfinder/js/proxy/elFinderSupportVer1"), array("inline"=>false,'block' => 'scriptBottom')); 
	} 
 
	function loadFinder($url){ 
		$code = "$(document).ready(function(){   
					var f = $('#finder').elfinder({
						url : '".$url."', 
						lang: 'no',
						transport : new elFinderSupportVer1(),
						docked : false,
						height: 600
					}).elfinder('instance');     
				}); ";  
		return $this->Html->scriptBlock($code, array("inline"=>false,'block' => 'scriptBottom')); 
	}
}  
?>