# Swagger\Client\SupplierApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**supplierDelete**](SupplierApi.md#supplierDelete) | **DELETE** /supplier/{id} | [BETA] Delete supplier by ID
[**supplierGet**](SupplierApi.md#supplierGet) | **GET** /supplier/{id} | Get supplier by ID.
[**supplierListPostList**](SupplierApi.md#supplierListPostList) | **POST** /supplier/list | [BETA] Create multiple suppliers. Related supplier addresses may also be created.
[**supplierListPutList**](SupplierApi.md#supplierListPutList) | **PUT** /supplier/list | [BETA] Update multiple suppliers. Addresses can also be updated.
[**supplierPost**](SupplierApi.md#supplierPost) | **POST** /supplier | Create supplier. Related supplier addresses may also be created.
[**supplierPut**](SupplierApi.md#supplierPut) | **PUT** /supplier/{id} | Update supplier.
[**supplierSearch**](SupplierApi.md#supplierSearch) | **GET** /supplier | Find suppliers corresponding with sent data.


# **supplierDelete**
> supplierDelete($id)

[BETA] Delete supplier by ID



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->supplierDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling SupplierApi->supplierDelete: ', $e->getMessage(), PHP_EOL;
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

# **supplierGet**
> \Swagger\Client\Model\ResponseWrapperSupplier supplierGet($id, $fields)

Get supplier by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->supplierGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierApi->supplierGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplier**](../Model/ResponseWrapperSupplier.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierListPostList**
> \Swagger\Client\Model\ListResponseSupplier supplierListPostList($body)

[BETA] Create multiple suppliers. Related supplier addresses may also be created.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Supplier()); // \Swagger\Client\Model\Supplier[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->supplierListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierApi->supplierListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Supplier[]**](../Model/Supplier.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplier**](../Model/ListResponseSupplier.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierListPutList**
> \Swagger\Client\Model\ListResponseSupplier supplierListPutList($body)

[BETA] Update multiple suppliers. Addresses can also be updated.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Supplier()); // \Swagger\Client\Model\Supplier[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->supplierListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierApi->supplierListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Supplier[]**](../Model/Supplier.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplier**](../Model/ListResponseSupplier.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierPost**
> \Swagger\Client\Model\ResponseWrapperSupplier supplierPost($body)

Create supplier. Related supplier addresses may also be created.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Supplier(); // \Swagger\Client\Model\Supplier | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->supplierPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierApi->supplierPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Supplier**](../Model/Supplier.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplier**](../Model/ResponseWrapperSupplier.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierPut**
> \Swagger\Client\Model\ResponseWrapperSupplier supplierPut($id, $body)

Update supplier.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Supplier(); // \Swagger\Client\Model\Supplier | Partial object describing what should be updated

try {
    $result = $apiInstance->supplierPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierApi->supplierPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Supplier**](../Model/Supplier.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplier**](../Model/ResponseWrapperSupplier.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierSearch**
> \Swagger\Client\Model\ListResponseSupplier supplierSearch($id, $supplier_number, $organization_number, $email, $invoice_email, $is_inactive, $account_manager_id, $changed_since, $is_wholesaler, $show_products, $from, $count, $sorting, $fields)

Find suppliers corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$supplier_number = "supplier_number_example"; // string | List of IDs
$organization_number = "organization_number_example"; // string | Equals
$email = "email_example"; // string | Equals
$invoice_email = "invoice_email_example"; // string | Equals
$is_inactive = false; // bool | Equals
$account_manager_id = "account_manager_id_example"; // string | List of IDs
$changed_since = "changed_since_example"; // string | Only return elements that have changed since this date and time
$is_wholesaler = true; // bool | Equals
$show_products = true; // bool | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->supplierSearch($id, $supplier_number, $organization_number, $email, $invoice_email, $is_inactive, $account_manager_id, $changed_since, $is_wholesaler, $show_products, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierApi->supplierSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **supplier_number** | **string**| List of IDs | [optional]
 **organization_number** | **string**| Equals | [optional]
 **email** | **string**| Equals | [optional]
 **invoice_email** | **string**| Equals | [optional]
 **is_inactive** | **bool**| Equals | [optional] [default to false]
 **account_manager_id** | **string**| List of IDs | [optional]
 **changed_since** | **string**| Only return elements that have changed since this date and time | [optional]
 **is_wholesaler** | **bool**| Equals | [optional]
 **show_products** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplier**](../Model/ListResponseSupplier.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

