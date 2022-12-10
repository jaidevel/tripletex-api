# Swagger\Client\ProductApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**productDelete**](ProductApi.md#productDelete) | **DELETE** /product/{id} | [BETA] Delete product.
[**productGet**](ProductApi.md#productGet) | **GET** /product/{id} | Get product by ID.
[**productImageDeleteImage**](ProductApi.md#productImageDeleteImage) | **DELETE** /product/{id}/image | [BETA] Delete image.
[**productImageUploadImage**](ProductApi.md#productImageUploadImage) | **POST** /product/{id}/image | [BETA] Upload image to Product. Existing image on product will be replaced if exists
[**productListPostList**](ProductApi.md#productListPostList) | **POST** /product/list | [BETA] Add multiple products.
[**productListPutList**](ProductApi.md#productListPutList) | **PUT** /product/list | [BETA] Update a list of products.
[**productPost**](ProductApi.md#productPost) | **POST** /product | Create new product.
[**productPut**](ProductApi.md#productPut) | **PUT** /product/{id} | Update product.
[**productSearch**](ProductApi.md#productSearch) | **GET** /product | Find products corresponding with sent data.


# **productDelete**
> productDelete($id)

[BETA] Delete product.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->productDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ProductApi->productDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productGet**
> \Swagger\Client\Model\ResponseWrapperProduct productGet($id, $fields)

Get product by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductApi->productGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProduct**](../Model/ResponseWrapperProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productImageDeleteImage**
> productImageDeleteImage($id)

[BETA] Delete image.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of Product containing the image to delete.

try {
    $apiInstance->productImageDeleteImage($id);
} catch (Exception $e) {
    echo 'Exception when calling ProductApi->productImageDeleteImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of Product containing the image to delete. |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productImageUploadImage**
> \Swagger\Client\Model\ResponseWrapperProduct productImageUploadImage($id, $file)

[BETA] Upload image to Product. Existing image on product will be replaced if exists



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Product ID to upload image to.
$file = "/path/to/file.txt"; // \SplFileObject | The file

try {
    $result = $apiInstance->productImageUploadImage($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductApi->productImageUploadImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Product ID to upload image to. |
 **file** | **\SplFileObject**| The file |

### Return type

[**\Swagger\Client\Model\ResponseWrapperProduct**](../Model/ResponseWrapperProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productListPostList**
> \Swagger\Client\Model\ListResponseProduct productListPostList($body)

[BETA] Add multiple products.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Product()); // \Swagger\Client\Model\Product[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductApi->productListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Product[]**](../Model/Product.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProduct**](../Model/ListResponseProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productListPutList**
> \Swagger\Client\Model\ListResponseProduct productListPutList($body)

[BETA] Update a list of products.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Product()); // \Swagger\Client\Model\Product[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->productListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductApi->productListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Product[]**](../Model/Product.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProduct**](../Model/ListResponseProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productPost**
> \Swagger\Client\Model\ResponseWrapperProduct productPost($body)

Create new product.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Product(); // \Swagger\Client\Model\Product | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductApi->productPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Product**](../Model/Product.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProduct**](../Model/ResponseWrapperProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productPut**
> \Swagger\Client\Model\ResponseWrapperProduct productPut($id, $body)

Update product.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Product(); // \Swagger\Client\Model\Product | Partial object describing what should be updated

try {
    $result = $apiInstance->productPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductApi->productPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Product**](../Model/Product.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProduct**](../Model/ResponseWrapperProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productSearch**
> \Swagger\Client\Model\ListResponseProduct productSearch($number, $ids, $product_number, $name, $ean, $is_inactive, $is_stock_item, $is_supplier_product, $supplier_id, $currency_id, $vat_type_id, $product_unit_id, $department_id, $account_id, $cost_excluding_vat_currency_from, $cost_excluding_vat_currency_to, $price_excluding_vat_currency_from, $price_excluding_vat_currency_to, $price_including_vat_currency_from, $price_including_vat_currency_to, $from, $count, $sorting, $fields)

Find products corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$number = "number_example"; // string | DEPRECATED. List of product numbers (Integer only)
$ids = "ids_example"; // string | List of IDs
$product_number = array("product_number_example"); // string[] | List of valid product numbers
$name = "name_example"; // string | Containing
$ean = "ean_example"; // string | Equals
$is_inactive = true; // bool | Equals
$is_stock_item = true; // bool | Equals
$is_supplier_product = true; // bool | Equals
$supplier_id = "supplier_id_example"; // string | Equals
$currency_id = "currency_id_example"; // string | Equals
$vat_type_id = "vat_type_id_example"; // string | Equals
$product_unit_id = "product_unit_id_example"; // string | Equals
$department_id = "department_id_example"; // string | Equals
$account_id = "account_id_example"; // string | Equals
$cost_excluding_vat_currency_from = 8.14; // float | From and including
$cost_excluding_vat_currency_to = 8.14; // float | To and excluding
$price_excluding_vat_currency_from = 8.14; // float | From and including
$price_excluding_vat_currency_to = 8.14; // float | To and excluding
$price_including_vat_currency_from = 8.14; // float | From and including
$price_including_vat_currency_to = 8.14; // float | To and excluding
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productSearch($number, $ids, $product_number, $name, $ean, $is_inactive, $is_stock_item, $is_supplier_product, $supplier_id, $currency_id, $vat_type_id, $product_unit_id, $department_id, $account_id, $cost_excluding_vat_currency_from, $cost_excluding_vat_currency_to, $price_excluding_vat_currency_from, $price_excluding_vat_currency_to, $price_including_vat_currency_from, $price_including_vat_currency_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductApi->productSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **number** | **string**| DEPRECATED. List of product numbers (Integer only) | [optional]
 **ids** | **string**| List of IDs | [optional]
 **product_number** | [**string[]**](../Model/string.md)| List of valid product numbers | [optional]
 **name** | **string**| Containing | [optional]
 **ean** | **string**| Equals | [optional]
 **is_inactive** | **bool**| Equals | [optional]
 **is_stock_item** | **bool**| Equals | [optional]
 **is_supplier_product** | **bool**| Equals | [optional]
 **supplier_id** | **string**| Equals | [optional]
 **currency_id** | **string**| Equals | [optional]
 **vat_type_id** | **string**| Equals | [optional]
 **product_unit_id** | **string**| Equals | [optional]
 **department_id** | **string**| Equals | [optional]
 **account_id** | **string**| Equals | [optional]
 **cost_excluding_vat_currency_from** | **float**| From and including | [optional]
 **cost_excluding_vat_currency_to** | **float**| To and excluding | [optional]
 **price_excluding_vat_currency_from** | **float**| From and including | [optional]
 **price_excluding_vat_currency_to** | **float**| To and excluding | [optional]
 **price_including_vat_currency_from** | **float**| From and including | [optional]
 **price_including_vat_currency_to** | **float**| To and excluding | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProduct**](../Model/ListResponseProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

