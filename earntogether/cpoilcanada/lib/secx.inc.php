<noscript><meta http-equiv="refresh" content="0;url=enablejava.html"></noscript>
 <?php
 ini_set('display_errors', 'Off');
  class Php_secx
{
	
	function full_secx()
	{
		if(isset($_REQUEST) && ($_REQUEST['description'] == '')){
			$dis = array('select','javascript:alert', 'insert', 'drop table','sleep','XOR','sysdate', 'union', 'null','order by','order+by','version','database','tables',
			'<script','/>','<script>','<script','onmouseover','<script>alert(','onclick','>script>','<META HTTP-EQUIV','refresh','<META HTTP-EQUIV','alert','onabort','onactivate',
			'onafterprint','onafterupdate','onbeforeactivate','onbeforecopy','onbeforecut','onbeforedeactivate','onbeforeeditfocus','onbeforepaste','onbeforeprint','onbeforeunload',
			'onbeforeupdate','onblur','onbounce','oncellchange','onchange','oncontextmenu','oncontrolselect','oncopy','oncut','ondataavailable','ondatasetchanged','ondatasetcomplete',
			'ondblclick','ondeactivate','ondrag','ondragend','ondragenter','ondragleave','ondragover','ondragstart','ondrop','onerror','onerrorupdate','onfilterchange','onfinish',
			'onfocus','onfocusin','onfocusout','onhashchange','onhelp','oninput','onkeydown','onkeypress','onkeyup','onload','onlosecapture','onmessage','onmousedown','onmouseenter',
			'onmouseleave','onmousemove','onmouseout','onmouseup','onmousewheel','onmove','onmoveend','onmovestart','onoffline','ononline','onpaste','onpropertychange',
			'onreadystatechange','onreset','onresize','onresizeend','onresizestart','onrowenter','onrowexit','onrowsdelete','onrowsinserted','onscroll','onsearch',
			'onselect','onselectionchange','onselectstart','onstart','onstop','onsubmit','onunload','%253','onload','%22%3E','<scr<script>ipt>','<s<script>cript>',
			'<sC<script>ript>','<SC<script>ript>','<SC<script>Ript>','<SC<script>RIpt>','<SC<script>RIPt>','<SC<script>RIPT>','<SC<Script>RIPT>','<SC<SCript>RIPT>',
			'<SC<SCRipt>RIPT>','<SC<SCRIpt>RIPT>','<SC<SCRIPt>RIPT>','<SC<SCRIPT>RIPT>','text/javascript','<script type=',"'","<",">");
			for ($i = 0; $i < sizeof($_REQUEST); ++$i){
				for ($j = 0; $j < sizeof($dis); ++$j){
					foreach($_REQUEST as $gets){
						if(preg_match(',' . $dis[$j] . ',', strtolower($gets))){
 							?>
							<script>alert("Sorry, Special Characters not allowed"); location.href='index.php'; </script>
 							<?php
 							exit();
						}
					}
				}
			}
		}
	}
}
 ?>