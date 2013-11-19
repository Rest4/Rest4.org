<?php
class RestHomeDefaultDriver extends RestSiteDriver
	{
	static $drvInf;
	static function getDrvInf($method=0)
		{
		$drvInf=new stdClass();
		$drvInf->name='Home: Default Driver';
		$drvInf->description='Try to run a default code if the specific driver doesn\'t exist.';
		$drvInf->usage='/home/{user.i18n}/index.{document.type}';
		$drvInf->methods=new stdClass();
		$drvInf->methods->options=new stdClass();
		$drvInf->methods->options->outputMimes='text/varstream';
		$drvInf->methods->head=$drvInf->methods->get=new stdClass();
		$drvInf->methods->get->outputMimes='text/html';
		return $drvInf;
		}
	function get()
		{
		$this->prepare();
		$mainModule=new stdClass();
		$node=strtolower($this->request->uriNodes[2]);
		$mainModule->template=$this->loadSiteTemplate('/system/'
		  .$this->core->document->type.'/content.tpl','mainModules.0',true);
		$this->loadSiteLocale($node,'','mainModules.0',true);
		$this->core->mainModules->append($mainModule);
		return $this->finish();
		}
	}

