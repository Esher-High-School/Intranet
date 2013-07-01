<?php
class Theme {
	public function getDate() {
		$date = date("D jS M Y");
		return $date;
	}
	
	public function getCss($style, $dir = null, $ext = false) {
		$themedir = Router::url('/', true);
		if ( $style == '' ) {
			return null;
		}
		if ( $dir == null ) {
			$css = ($themedir . 'css/' . $style . '.css');
		} elseif ($dir == '/') {
			$css = ($themedir . $style . '.css');
		} else {
			$css = ($themedir . $dir . '/' . $style . '.css');
		}
		if ( $ext == true ) {
			$css = ($style);
		}
		$code = ('<link href="' . $css . '" rel="stylesheet" type="text/css">' . "\n");
		return $code;
	}

 	public function getLess($style, $dir = null) {
		$themedir = Router::url('/', true);
		if ( $style == '' ) {
			return null;
		}
		if ( $dir == null ) {
			$css = ($themedir . 'css/' . $style . '.less');
		} elseif ($dir == '/') {
			$css = ($themedir . $style . '.less');
		} else {
			$css = ($themedir . $dir . '/' . $style . '.less');
		}
		$code = ('<link href="' . $css . '" rel="stylesheet" type="text/less">' . "\n");
		return $code;
	}
	
	public function getJs($script) {
		$themedir = Router::url('/', true);
		if ($script == '') {
			return null;
		}
		$js = ($themedir . 'js/' . $script . '.js');
		$code = ('<script src="' . $js . '"></script>' . "\n");
		return $code;
	}

	public function getImgUrl($img) {
		$sitedir = Router::url('/', true);
		return ($sitedir . $img);
	}
	
	public function getImg($img, $alt=null, $nl = true) {
		if ($alt == null) {
			$alt = '';
		}
		if ($nl !== false) {
			$nl = "\n";
		} else {
			$nl = '';
		}
		$sitedir = Router::url('/', true);
		$code = ('<img src="' . $sitedir . 'img/' . $img . '" alt="' . $alt . '">' . $nl);
		return $code;
	}
}