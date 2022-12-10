# Swagger\Client\CustomercategoryApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**customerCategoryGet**](CustomercategoryApi.md#customerCategoryGet) | **GET** /customer/category/{id} | Find customer/supplier category by ID.
[**customerCategoryPost**](CustomercategoryApi.md#customerCategoryPost) | **POST** /customer/category | Add new customer/supplier category.
[**customerCategoryPut**](CustomercategoryApi.md#customerCategoryPut) | **PUT** /customer/category/{id} | Update customer/supplier category.
[**customerCategorySearch**](CustomercategoryApi.md#customerCategorySearch) | **GET** /customer/category | Find customer/supplier categories corresponding with sent data.


# **customerCategoryGet**
> \Swagger\Client\Model\ResponseWrapperCustomerCategory customerCategoryGet($id, $fields)

Find customer/supplier category by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomercategoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->customerCategoryGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomercategoryApi->customerCategoryGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCustomerCategory**](../Model/ResponseWrapperCustomerCategory.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **customerCategoryPost**
> \Swagger\Client\Model\ResponseWrapperCustomerCategory customerCategoryPost($body)

Add new customer/supplier category.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomercategoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\CustomerCategory(); // \Swagger\Client\Model\CustomerCategory | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->customerCategoryPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomercategoryApi->customerCategoryPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\CustomerCategory**](../Model/CustomerCategory.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCustomerCategory**](../Model/ResponseWrapperCustomerCategory.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **customerCategoryPut**
> \Swagger\Client\Model\ResponseWrapperCustomerCategory customerCategoryPut($id, $body)

Update customer/supplier category.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomercategoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\CustomerCategory(); // \Swagger\Client\Model\CustomerCategory | Partial object describing what should be updated

try {
    $result = $apiInstance->customerCategoryPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomercategoryApi->customerCategoryPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\CustomerCategory**](../Model/CustomerCategory.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCustomerCategory**](../Model/ResponseWrapperCustomerCategory.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **customerCategorySearch**
> \Swagger\Client\Model\ListResponseCustomerCategory customerCategorySearch($id, $name, $number, $description, $type, $from, $count, $sorting, $fields)

Find customer/supplier categories corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomercategoryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$name = "name_example"; // string | Containing
$number = "number_example"; // string | Equals
$description = "description_example"; // string | Containing
$type = "type_example"; // string | List of IDs
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->customerCategorySearch($id, $name, $number, $description, $type, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomercategoryApi->customerCategorySearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **name** | **string**| Containing | [optional]
 **number** | **string**| Equals | [optional]
 **description** | **string**| Containing | [optional]
 **type** | **string**| List of IDs | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseCustomerCategory**](../Model/ListResponseCustomerCategory.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

