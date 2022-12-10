# Swagger\Client\EmployeehourlyCostAndRateApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**employeeHourlyCostAndRateGet**](EmployeehourlyCostAndRateApi.md#employeeHourlyCostAndRateGet) | **GET** /employee/hourlyCostAndRate/{id} | Find hourly cost and rate by ID.
[**employeeHourlyCostAndRatePost**](EmployeehourlyCostAndRateApi.md#employeeHourlyCostAndRatePost) | **POST** /employee/hourlyCostAndRate | Create hourly cost and rate.
[**employeeHourlyCostAndRatePut**](EmployeehourlyCostAndRateApi.md#employeeHourlyCostAndRatePut) | **PUT** /employee/hourlyCostAndRate/{id} | Update hourly cost and rate.
[**employeeHourlyCostAndRateSearch**](EmployeehourlyCostAndRateApi.md#employeeHourlyCostAndRateSearch) | **GET** /employee/hourlyCostAndRate | Find all hourly cost and rates for employee.


# **employeeHourlyCostAndRateGet**
> \Swagger\Client\Model\ResponseWrapperHourlyCostAndRate employeeHourlyCostAndRateGet($id, $fields)

Find hourly cost and rate by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeehourlyCostAndRateApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeHourlyCostAndRateGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeehourlyCostAndRateApi->employeeHourlyCostAndRateGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperHourlyCostAndRate**](../Model/ResponseWrapperHourlyCostAndRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeHourlyCostAndRatePost**
> \Swagger\Client\Model\ResponseWrapperHourlyCostAndRate employeeHourlyCostAndRatePost($body)

Create hourly cost and rate.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeehourlyCostAndRateApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\HourlyCostAndRate(); // \Swagger\Client\Model\HourlyCostAndRate | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->employeeHourlyCostAndRatePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeehourlyCostAndRateApi->employeeHourlyCostAndRatePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\HourlyCostAndRate**](../Model/HourlyCostAndRate.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperHourlyCostAndRate**](../Model/ResponseWrapperHourlyCostAndRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeHourlyCostAndRatePut**
> \Swagger\Client\Model\ResponseWrapperHourlyCostAndRate employeeHourlyCostAndRatePut($id, $body)

Update hourly cost and rate.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeehourlyCostAndRateApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\HourlyCostAndRate(); // \Swagger\Client\Model\HourlyCostAndRate | Partial object describing what should be updated

try {
    $result = $apiInstance->employeeHourlyCostAndRatePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeehourlyCostAndRateApi->employeeHourlyCostAndRatePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\HourlyCostAndRate**](../Model/HourlyCostAndRate.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperHourlyCostAndRate**](../Model/ResponseWrapperHourlyCostAndRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeHourlyCostAndRateSearch**
> \Swagger\Client\Model\ListResponseHourlyCostAndRate employeeHourlyCostAndRateSearch($employee_id, $from, $count, $sorting, $fields)

Find all hourly cost and rates for employee.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeehourlyCostAndRateApi(
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
    $result = $apiInstance->employeeHourlyCostAndRateSearch($employee_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeehourlyCostAndRateApi->employeeHourlyCostAndRateSearch: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\ListResponseHourlyCostAndRate**](../Model/ListResponseHourlyCostAndRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

