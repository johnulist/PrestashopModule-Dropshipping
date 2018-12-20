<?php

include(dirname(__FILE__).'/config/config.inc.php');
include(dirname(__FILE__).'/init.php');


class RestApiModule extends Module
{
    public function __construct() 
    {
        $this->name = 'restapimodule';
        $this->tab = 'front_office_features';
        $this->version = '1.1';

        parent::__construct();
    }

    public function install() 
    {
        return parent::install() && $this->registerHook('moduleRoutes');
    }

    public function hookModuleRoutes()
    {
        return [
            'module-restapimodule-login' => [
                'rule' => 'restapimodule/login',
                'keywords' => [],
                'controller' => 'login',
                'params' => [
                    'fc' => 'module',
                    'module' => 'restapimodule'
                ] 
            ]              
        ];
    }
	
	 public static function addprod($name,$price,$quantity)
    {
		
		$context=Context::getContext();
$product = new Product();
	$product->ean13 = 9999999999999;
	$product->name = array((int)Configuration::get('PS_LANG_DEFAULT') =>  $name);;
	$product->link_rewrite = array((int)Configuration::get('PS_LANG_DEFAULT') =>  'apple-fruit');
	$product->id_category = 2;   //category ids
	$product->id_category_default = 2;
	$product->redirect_type = '404';
 //Set price for product
	$product->price = $price;  
//Set Quantity
	$product->quantity = 1;   
	$product->minimal_quantity = 1;
	$product->show_price = 1;
	$product->on_sale = 0;
	$product->online_only = 1;
	$product->meta_keywords = 'test';
	$product->is_virtual=1;
	StockAvailable::setQuantity($product->id_product, $product->id_product_attribute , $quantity);

        //Finally we call add method of Product Class using $product object.
	$product->add();
	print("product");
	print("quantity id :".$product->id);
	print("attr  :".$product->id);
	print("quantity :".$quantity);
	StockAvailable::setQuantity($product->id, 0 , $quantity);

	// Now we use $product object,that we added/created
	$product->addToCategories(array(2));
	$shops = Shop::getShops(true, null, true);    

	//adding images for the product
	$image = new Image();
	$image->id_product = $id_product;
	$image->position = Image::getHighestPosition($id_product) + 1;
	$image->cover = true; // or false;
	if (($image->validateFields(false, true)) === true &&
	($image->validateFieldsLang(false, true)) === true && $image->add())
	{
		$image->associateTo($shops);		
	}
        
        return True;
    }
	
	
    public static function addprod_test()
    {
		
		$context=Context::getContext();
$product = new Product();
	$product->ean13 = 9999999999999;
	$product->name = array((int)Configuration::get('PS_LANG_DEFAULT') =>  'Apple Fruit');;
	$product->link_rewrite = array((int)Configuration::get('PS_LANG_DEFAULT') =>  'apple-fruit');
	$product->id_category = 2;   //category ids
	$product->id_category_default = 2;
	$product->redirect_type = '404';
 //Set price for product
	$product->price = 20.00;  
//Set Quantity
	$product->quantity = 1;   
	$product->minimal_quantity = 1;
	$product->show_price = 1;
	$product->on_sale = 0;
	$product->online_only = 1;
	$product->meta_keywords = 'test';
	$product->is_virtual=1;

        //Finally we call add method of Product Class using $product object.
	$product->add();

	// Now we use $product object,that we added/created
	$product->addToCategories(array(2));
	$shops = Shop::getShops(true, null, true);    
	


	//adding images for the product
	$image = new Image();
	$image->id_product = $id_product;
	$image->position = Image::getHighestPosition($id_product) + 1;
	$image->cover = true; // or false;
	if (($image->validateFields(false, true)) === true &&
	($image->validateFieldsLang(false, true)) === true && $image->add())
	{
		$image->associateTo($shops);		
	}
        
        return True;
    }
}