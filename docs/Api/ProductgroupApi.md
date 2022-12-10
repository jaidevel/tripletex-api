# Swagger\Client\ProductgroupApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**productGroupDelete**](ProductgroupApi.md#productGroupDelete) | **DELETE** /product/group/{id} | [BETA] Delete product group.
[**productGroupGet**](ProductgroupApi.md#productGroupGet) | **GET** /product/group/{id} | [BETA] Find product group by ID.
[**productGroupListDeleteByIds**](ProductgroupApi.md#productGroupListDeleteByIds) | **DELETE** /product/group/list | [BETA] Delete multiple product groups.
[**productGroupListPostList**](ProductgroupApi.md#productGroupListPostList) | **POST** /product/group/list | [BETA] Add multiple products groups.
[**productGroupListPutList**](ProductgroupApi.md#productGroupListPutList) | **PUT** /product/group/list | [BETA] Update a list of product groups.
[**productGroupPost**](ProductgroupApi.md#productGroupPost) | **POST** /product/group | [BETA] Create new product group.
[**productGroupPut**](ProductgroupApi.md#productGroupPut) | **PUT** /product/group/{id} | [BETA] Update product group.
[**productGroupQueryQuery**](ProductgroupApi.md#productGroupQueryQuery) | **GET** /product/group/query | [BETA] Wildcard search.
[**productGroupSearch**](ProductgroupApi.md#productGroupSearch) | **GET** /product/group | [BETA] Find product group with sent data


# **productGroupDelete**
> productGroupDelete($id)

[BETA] Delete product group.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductgroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->productGroupDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ProductgroupApi->productGroupDelete: ', $e->getMessage(), PHP_EOL;
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

# **productGroupGet**
> \Swagger\Client\Model\ResponseWrapperProductGroup productGroupGet($id, $fields)

[BETA] Find product group by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductgroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productGroupGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductgroupApi->productGroupGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductGroup**](../Model/ResponseWrapperProductGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productGroupListDeleteByIds**
> productGroupListDeleteByIds($ids)

[BETA] Delete multiple product groups.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductgroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->productGroupListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling ProductgroupApi->productGroupListDeleteByIds: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| ID of the elements |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productGroupListPostList**
> \Swagger\Client\Model\ListResponseProductGroup productGroupListPostList($body)

[BETA] Add multiple products groups.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductgroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProductGroup()); // \Swagger\Client\Model\ProductGroup[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productGroupListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductgroupApi->productGroupListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductGroup[]**](../Model/ProductGroup.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductGroup**](../Model/ListResponseProductGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productGroupListPutList**
> \Swagger\Client\Model\ListResponseProductGroup productGroupListPutList($body)

[BETA] Update a list of product groups.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductgroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProductGroup()); // \Swagger\Client\Model\ProductGroup[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->productGroupListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductgroupApi->productGroupListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductGroup[]**](../Model/ProductGroup.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductGroup**](../Model/ListResponseProductGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productGroupPost**
> \Swagger\Client\Model\ResponseWrapperProductGroup productGroupPost($body)

[BETA] Create new product group.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductgroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ProductGroup(); // \Swagger\Client\Model\ProductGroup | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productGroupPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductgroupApi->productGroupPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductGroup**](../Model/ProductGroup.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductGroup**](../Model/ResponseWrapperProductGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productGroupPut**
> \Swagger\Client\Model\ResponseWrapperProductGroup productGroupPut($id, $body)

[BETA] Update product group.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductgroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\ProductGroup(); // \Swagger\Client\Model\ProductGroup | Partial object describing what should be updated

try {
    $result = $apiInstance->productGroupPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductgroupApi->productGroupPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\ProductGroup**](../Model/ProductGroup.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductGroup**](../Model/ResponseWrapperProductGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productGroupQueryQuery**
> \Swagger\Client\Model\ListResponseProductGroup productGroupQueryQuery($query, $name, $fields, $from, $count, $sorting)

[BETA] Wildcard search.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductgroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$query = "query_example"; // string | Containing
$name = "name_example"; // string | Containing
$fields = "id, name"; // string | Fields filter pattern
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern

try {
    $result = $apiInstance->productGroupQueryQuery($query, $name, $fields, $from, $count, $sorting);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductgroupApi->productGroupQueryQuery: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **query** | **string**| Containing | [optional]
 **name** | **string**| Containing | [optional]
 **fields** | **string**| Fields filter pattern | [optional] [default to id, name]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductGroup**](../Model/ListResponseProductGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productGroupSearch**
> \Swagger\Client\Model\ListResponseProductGroup productGroupSearch($id, $name, $from, $count, $sorting, $fields)

[BETA] Find product group with sent data



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductgroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$name = "name_example"; // string | Containing
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productGroupSearch($id, $name, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductgroupApi->productGroupSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **name** | **string**| Containing | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductGroup**](../Model/ListResponseProductGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

