# Swagger\Client\EmployeeemploymentemploymentTypeApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**employeeEmploymentEmploymentTypeEmploymentEndReasonTypeGetEmploymentEndReasonType**](EmployeeemploymentemploymentTypeApi.md#employeeEmploymentEmploymentTypeEmploymentEndReasonTypeGetEmploymentEndReasonType) | **GET** /employee/employment/employmentType/employmentEndReasonType | Find all employment end reason type IDs.
[**employeeEmploymentEmploymentTypeEmploymentFormTypeGetEmploymentFormType**](EmployeeemploymentemploymentTypeApi.md#employeeEmploymentEmploymentTypeEmploymentFormTypeGetEmploymentFormType) | **GET** /employee/employment/employmentType/employmentFormType | Find all employment form type IDs.
[**employeeEmploymentEmploymentTypeMaritimeEmploymentTypeGetMaritimeEmploymentType**](EmployeeemploymentemploymentTypeApi.md#employeeEmploymentEmploymentTypeMaritimeEmploymentTypeGetMaritimeEmploymentType) | **GET** /employee/employment/employmentType/maritimeEmploymentType | Find all maritime employment type IDs.
[**employeeEmploymentEmploymentTypeSalaryTypeGetSalaryType**](EmployeeemploymentemploymentTypeApi.md#employeeEmploymentEmploymentTypeSalaryTypeGetSalaryType) | **GET** /employee/employment/employmentType/salaryType | Find all salary type IDs.
[**employeeEmploymentEmploymentTypeScheduleTypeGetScheduleType**](EmployeeemploymentemploymentTypeApi.md#employeeEmploymentEmploymentTypeScheduleTypeGetScheduleType) | **GET** /employee/employment/employmentType/scheduleType | Find all schedule type IDs.
[**employeeEmploymentEmploymentTypeSearch**](EmployeeemploymentemploymentTypeApi.md#employeeEmploymentEmploymentTypeSearch) | **GET** /employee/employment/employmentType | Find all employment type IDs.


# **employeeEmploymentEmploymentTypeEmploymentEndReasonTypeGetEmploymentEndReasonType**
> \Swagger\Client\Model\ListResponseEmploymentType employeeEmploymentEmploymentTypeEmploymentEndReasonTypeGetEmploymentEndReasonType($from, $count, $sorting, $fields)

Find all employment end reason type IDs.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentemploymentTypeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentEmploymentTypeEmploymentEndReasonTypeGetEmploymentEndReasonType($from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentemploymentTypeApi->employeeEmploymentEmploymentTypeEmploymentEndReasonTypeGetEmploymentEndReasonType: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEmploymentType**](../Model/ListResponseEmploymentType.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentEmploymentTypeEmploymentFormTypeGetEmploymentFormType**
> \Swagger\Client\Model\ListResponseEmploymentType employeeEmploymentEmploymentTypeEmploymentFormTypeGetEmploymentFormType($from, $count, $sorting, $fields)

Find all employment form type IDs.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentemploymentTypeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentEmploymentTypeEmploymentFormTypeGetEmploymentFormType($from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentemploymentTypeApi->employeeEmploymentEmploymentTypeEmploymentFormTypeGetEmploymentFormType: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEmploymentType**](../Model/ListResponseEmploymentType.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentEmploymentTypeMaritimeEmploymentTypeGetMaritimeEmploymentType**
> \Swagger\Client\Model\ListResponseEmploymentType employeeEmploymentEmploymentTypeMaritimeEmploymentTypeGetMaritimeEmploymentType($type, $from, $count, $sorting, $fields)

Find all maritime employment type IDs.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentemploymentTypeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type = "type_example"; // string | maritimeEmploymentType
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentEmploymentTypeMaritimeEmploymentTypeGetMaritimeEmploymentType($type, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentemploymentTypeApi->employeeEmploymentEmploymentTypeMaritimeEmploymentTypeGetMaritimeEmploymentType: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type** | **string**| maritimeEmploymentType |
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEmploymentType**](../Model/ListResponseEmploymentType.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentEmploymentTypeSalaryTypeGetSalaryType**
> \Swagger\Client\Model\ListResponseEmploymentType employeeEmploymentEmploymentTypeSalaryTypeGetSalaryType($from, $count, $sorting, $fields)

Find all salary type IDs.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentemploymentTypeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentEmploymentTypeSalaryTypeGetSalaryType($from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentemploymentTypeApi->employeeEmploymentEmploymentTypeSalaryTypeGetSalaryType: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEmploymentType**](../Model/ListResponseEmploymentType.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentEmploymentTypeScheduleTypeGetScheduleType**
> \Swagger\Client\Model\ListResponseEmploymentType employeeEmploymentEmploymentTypeScheduleTypeGetScheduleType($from, $count, $sorting, $fields)

Find all schedule type IDs.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentemploymentTypeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentEmploymentTypeScheduleTypeGetScheduleType($from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentemploymentTypeApi->employeeEmploymentEmploymentTypeScheduleTypeGetScheduleType: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEmploymentType**](../Model/ListResponseEmploymentType.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentEmploymentTypeSearch**
> \Swagger\Client\Model\ListResponseEmploymentType employeeEmploymentEmploymentTypeSearch($from, $count, $sorting, $fields)

Find all employment type IDs.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentemploymentTypeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentEmploymentTypeSearch($from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentemploymentTypeApi->employeeEmploymentEmploymentTypeSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEmploymentType**](../Model/ListResponseEmploymentType.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

