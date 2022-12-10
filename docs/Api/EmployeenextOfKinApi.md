# Swagger\Client\EmployeenextOfKinApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**employeeNextOfKinGet**](EmployeenextOfKinApi.md#employeeNextOfKinGet) | **GET** /employee/nextOfKin/{id} | Find next of kin by ID.
[**employeeNextOfKinPost**](EmployeenextOfKinApi.md#employeeNextOfKinPost) | **POST** /employee/nextOfKin | Create next of kin.
[**employeeNextOfKinPut**](EmployeenextOfKinApi.md#employeeNextOfKinPut) | **PUT** /employee/nextOfKin/{id} | Update next of kin.
[**employeeNextOfKinSearch**](EmployeenextOfKinApi.md#employeeNextOfKinSearch) | **GET** /employee/nextOfKin | Find all next of kin for employee.


# **employeeNextOfKinGet**
> \Swagger\Client\Model\ResponseWrapperNextOfKin employeeNextOfKinGet($id, $fields)

Find next of kin by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeenextOfKinApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeNextOfKinGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeenextOfKinApi->employeeNextOfKinGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperNextOfKin**](../Model/ResponseWrapperNextOfKin.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeNextOfKinPost**
> \Swagger\Client\Model\ResponseWrapperNextOfKin employeeNextOfKinPost($body)

Create next of kin.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeenextOfKinApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\NextOfKin(); // \Swagger\Client\Model\NextOfKin | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->employeeNextOfKinPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeenextOfKinApi->employeeNextOfKinPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\NextOfKin**](../Model/NextOfKin.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperNextOfKin**](../Model/ResponseWrapperNextOfKin.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeNextOfKinPut**
> \Swagger\Client\Model\ResponseWrapperNextOfKin employeeNextOfKinPut($id, $body)

Update next of kin.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeenextOfKinApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\NextOfKin(); // \Swagger\Client\Model\NextOfKin | Partial object describing what should be updated

try {
    $result = $apiInstance->employeeNextOfKinPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeenextOfKinApi->employeeNextOfKinPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\NextOfKin**](../Model/NextOfKin.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperNextOfKin**](../Model/ResponseWrapperNextOfKin.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeNextOfKinSearch**
> \Swagger\Client\Model\ListResponseNextOfKin employeeNextOfKinSearch($employee_id, $from, $count, $sorting, $fields)

Find all next of kin for employee.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeenextOfKinApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Employee ID. Defaults to ID of token owner.
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeNextOfKinSearch($employee_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeenextOfKinApi->employeeNextOfKinSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| Employee ID. Defaults to ID of token owner. | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseNextOfKin**](../Model/ListResponseNextOfKin.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

