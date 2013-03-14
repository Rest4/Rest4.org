<?php
class RestHomeDefaultDriver extends RestSiteDriver
	{
	static $drvInf;
	static function getDrvInf()
		{
		$drvInf=new xcDataObject();
		$drvInf->name='Home: Deafault Driver';
		$drvInf->description='Try to run a default code if the specific driver doesn\'t exist.';
		$drvInf->usage='/home/{user.i18n}/index.{document.type}';
		$drvInf->methods=new xcDataObject();
		$drvInf->methods->options=new xcDataObject();
		$drvInf->methods->options->outputMimes='application/internal';
		$drvInf->methods->head=$drvInf->methods->get=new xcDataObject();
		$drvInf->methods->get->outputMimes='text/html';
		return $drvInf;
		}
	function get()
		{
		$this->prepare();
		$mainModule=new xcDataObject();
		$node=strtolower($this->request->uriNodes[2]);
		$mainModule->template=$this->loadSiteTemplate('/system/'.$this->core->document->type.'/content.tpl','mainModules.0',true);
		$this->loadSiteLocale($node,'','mainModules.0',true);
		$this->core->mainModules->append($mainModule);
		return $this->finish();
		}
	}
RestHomeDefaultDriver::$drvInf=RestHomeDefaultDriver::getDrvInf();