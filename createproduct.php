<?php

require('C:\wamp64\www\prestashop_1.7.2.4\config\config.inc.php');


/*


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
	
	$data = json_decode('{"active":false,"price":296,"quantity":"108 ","shippingCost":"","id_category":""}' );
var_dump($data);
"{"active":false,"price":296,"quantity":"108 ","title":"WZATCO CTL60 3D Projecteur Mise À Niveau Android 7.1 WiFi 5500 Lumens Full HD 1080 p 4 k Multimédia LED Proyector Beamer pour Home Cinéma","shippingCost":"","id_category":""}"

*/
//C:\wamp64\bin\php\php5.6.31\php.exe -q createproduct.php



/*$productObj = new Product("aa",1234);






$.ajax({
    url: "http://127.0.0.1:8080/prestashop_1.7.2.4/restapimodule/login",
    type: 'POST',

    data: {
        ajax: true,
        action: 'checkProductIfExist',
		product: '{"active":false,"price":296,"quantity":"108 ","name":"ZZZZZZZZZZZZZZ CTL60 3D Projecteur Mise À Niveau Android 7.1 WiFi 5500 Lumens Full HD 1080 p 4 k Multimédia LED Proyec","shippingCost":"","id_category":""}'
    },
    success: function (data) {
        console.log(data);
    },
    fail: function () {
      console.log("failled");
    }
});



*/
$module = ModuleCore::getInstanceByName("restapimodule");
$module->addprod("aaa",1234,123); 
	
$data = array(
'action' => 'action', 
'product' => '{"active":false,"price":296,"quantity":"108 ","name":"WZATCO"}' ,
);
//$data[""]="'{$data["product"]}'";
$data['product'] = json_decode($data["product"], true);
var_dump($data["product"]);
 print($data["product"]["name"]);
$module = ModuleCore::getInstanceByName("restapimodule");
//$module->addprod($data['product']['name'],$data['product']['price']);
 
$productObj = new Product();
 $result = Db::getInstance()->ExecuteS('
            SELECT `id_product`
            FROM `' . _DB_PREFIX_ . 'product` p
            WHERE p.`reference` = \'' . pSQL($productData->productId) . '\'');

var_dump(count($result));

