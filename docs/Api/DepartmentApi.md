# Swagger\Client\DepartmentApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**departmentDelete**](DepartmentApi.md#departmentDelete) | **DELETE** /department/{id} | Delete department by ID
[**departmentGet**](DepartmentApi.md#departmentGet) | **GET** /department/{id} | Get department by ID.
[**departmentListPostList**](DepartmentApi.md#departmentListPostList) | **POST** /department/list | Register new departments.
[**departmentListPutList**](DepartmentApi.md#departmentListPutList) | **PUT** /department/list | Update multiple departments.
[**departmentPost**](DepartmentApi.md#departmentPost) | **POST** /department | Add new department.
[**departmentPut**](DepartmentApi.md#departmentPut) | **PUT** /department/{id} | Update department.
[**departmentQueryQuery**](DepartmentApi.md#departmentQueryQuery) | **GET** /department/query | Wildcard search.
[**departmentSearch**](DepartmentApi.md#departmentSearch) | **GET** /department | Find department corresponding with sent data.


# **departmentDelete**
> departmentDelete($id)

Delete department by ID



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DepartmentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->departmentDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentApi->departmentDelete: ', $e->getMessage(), PHP_EOL;
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

# **departmentGet**
> \Swagger\Client\Model\ResponseWrapperDepartment departmentGet($id, $fields)

Get department by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DepartmentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->departmentGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentApi->departmentGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDepartment**](../Model/ResponseWrapperDepartment.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **departmentListPostList**
> \Swagger\Client\Model\ListResponseDepartment departmentListPostList($body)

Register new departments.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DepartmentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Department()); // \Swagger\Client\Model\Department[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->departmentListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentApi->departmentListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Department[]**](../Model/Department.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDepartment**](../Model/ListResponseDepartment.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **departmentListPutList**
> \Swagger\Client\Model\ListResponseDepartment departmentListPutList($body)

Update multiple departments.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DepartmentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Department()); // \Swagger\Client\Model\Department[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->departmentListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentApi->departmentListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Department[]**](../Model/Department.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDepartment**](../Model/ListResponseDepartment.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **departmentPost**
> \Swagger\Client\Model\ResponseWrapperDepartment departmentPost($body)

Add new department.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DepartmentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Department(); // \Swagger\Client\Model\Department | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->departmentPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentApi->departmentPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Department**](../Model/Department.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDepartment**](../Model/ResponseWrapperDepartment.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **departmentPut**
> \Swagger\Client\Model\ResponseWrapperDepartment departmentPut($id, $body)

Update department.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DepartmentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Department(); // \Swagger\Client\Model\Department | Partial object describing what should be updated

try {
    $result = $apiInstance->departmentPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentApi->departmentPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Department**](../Model/Department.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDepartment**](../Model/ResponseWrapperDepartment.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **departmentQueryQuery**
> \Swagger\Client\Model\ListResponseDepartment departmentQueryQuery($id, $query, $count, $fields, $is_inactive, $from, $sorting)

Wildcard search.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DepartmentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$query = "query_example"; // string | Containing
$count = 25; // int | Number of elements to return
$fields = "id, name"; // string | Fields filter pattern
$is_inactive = true; // bool | true - return only inactive departments; false - return only active departments; unspecified - return both types
$from = 0; // int | From index
$sorting = "sorting_example"; // string | Sorting pattern

try {
    $result = $apiInstance->departmentQueryQuery($id, $query, $count, $fields, $is_inactive, $from, $sorting);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentApi->departmentQueryQuery: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **query** | **string**| Containing | [optional]
 **count** | **int**| Number of elements to return | [optional] [default to 25]
 **fields** | **string**| Fields filter pattern | [optional] [default to id, name]
 **is_inactive** | **bool**| true - return only inactive departments; false - return only active departments; unspecified - return both types | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **sorting** | **string**| Sorting pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDepartment**](../Model/ListResponseDepartment.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **departmentSearch**
> \Swagger\Client\Model\ListResponseDepartment departmentSearch($id, $name, $department_number, $department_manager_id, $is_inactive, $from, $count, $sorting, $fields)

Find department corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DepartmentApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$name = "name_example"; // string | Containing
$department_number = "department_number_example"; // string | Containing
$department_manager_id = "department_manager_id_example"; // string | List of IDs
$is_inactive = true; // bool | true - return only inactive departments; false - return only active departments; unspecified - return both types
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->departmentSearch($id, $name, $department_number, $department_manager_id, $is_inactive, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DepartmentApi->departmentSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **name** | **string**| Containing | [optional]
 **department_number** | **string**| Containing | [optional]
 **department_manager_id** | **string**| List of IDs | [optional]
 **is_inactive** | **bool**| true - return only inactive departments; false - return only active departments; unspecified - return both types | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDepartment**](../Model/ListResponseDepartment.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

