<?php
require_once __DIR__ . '/../AbstractRestController.php';

include(dirname(__FILE__).'/config/config.inc.php');
include(dirname(__FILE__).'/init.php');


class RestApiModuleLoginModuleFrontController extends AbstractRestController
{
    protected function processGetRequest()
    {


        // do something then output the result
        $this->ajaxDie(json_encode([
            'success' => true,
            'operation' => 'get'
        ]));
    }

    protected function processPostRequest()
    {
		
		  $data = array(
			  'action' => Tools::getValue('action'), // Retrieved from GET vars
			  'product' => Tools::getValue('product') ,// json_decode(Tools::getValue('product'), true) , // Retrieved from GET vars
			);

		

$data['product'] = json_decode($data["product"], true);
//$data['product'] = json_decode($data["product"], true);	
 $module = ModuleCore::getInstanceByName("restapimodule");
$module->addprod($data['product']['title'],$data['product']['price'],$data['product']['quantity']);
	

			
		$this->ajaxDie(json_encode([
            'success' => true,
            'operation' => var_export($data, true)
        ]));	
        // do something then output the result

    }

    protected function processPutRequest()
    {
        // do something then output the result
        $this->ajaxDie(json_encode([
            'success' => true,
            'operation' => 'put'
        ]));
    }

    protected function processDeleteRequest()
    {
        // do something then output the result
        $this->ajaxDie(json_encode([
            'success' => true,
            'operation' => 'delete'
        ]));
    }
}
