# Swagger\Client\TimesheetsalaryTypeSpecificationApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**timesheetSalaryTypeSpecificationDelete**](TimesheetsalaryTypeSpecificationApi.md#timesheetSalaryTypeSpecificationDelete) | **DELETE** /timesheet/salaryTypeSpecification/{id} | [BETA] Delete a timesheet SalaryType Specification
[**timesheetSalaryTypeSpecificationGet**](TimesheetsalaryTypeSpecificationApi.md#timesheetSalaryTypeSpecificationGet) | **GET** /timesheet/salaryTypeSpecification/{id} | [BETA] Get timesheet SalaryType Specification for a specific ID
[**timesheetSalaryTypeSpecificationPost**](TimesheetsalaryTypeSpecificationApi.md#timesheetSalaryTypeSpecificationPost) | **POST** /timesheet/salaryTypeSpecification | [BETA] Create a timesheet SalaryType Specification. Only one entry per employee/date/SalaryType
[**timesheetSalaryTypeSpecificationPut**](TimesheetsalaryTypeSpecificationApi.md#timesheetSalaryTypeSpecificationPut) | **PUT** /timesheet/salaryTypeSpecification/{id} | [BETA] Update a timesheet SalaryType Specification
[**timesheetSalaryTypeSpecificationSearch**](TimesheetsalaryTypeSpecificationApi.md#timesheetSalaryTypeSpecificationSearch) | **GET** /timesheet/salaryTypeSpecification | [BETA] Get list of timesheet SalaryType Specifications


# **timesheetSalaryTypeSpecificationDelete**
> timesheetSalaryTypeSpecificationDelete($id)

[BETA] Delete a timesheet SalaryType Specification



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->timesheetSalaryTypeSpecificationDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryTypeSpecificationApi->timesheetSalaryTypeSpecificationDelete: ', $e->getMessage(), PHP_EOL;
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

# **timesheetSalaryTypeSpecificationGet**
> \Swagger\Client\Model\ResponseWrapperTimesheetSalaryTypeSpecification timesheetSalaryTypeSpecificationGet($id, $fields)

[BETA] Get timesheet SalaryType Specification for a specific ID



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetSalaryTypeSpecificationGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryTypeSpecificationApi->timesheetSalaryTypeSpecificationGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetSalaryTypeSpecification**](../Model/ResponseWrapperTimesheetSalaryTypeSpecification.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetSalaryTypeSpecificationPost**
> \Swagger\Client\Model\ResponseWrapperTimesheetSalaryTypeSpecification timesheetSalaryTypeSpecificationPost($body)

[BETA] Create a timesheet SalaryType Specification. Only one entry per employee/date/SalaryType



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\TimesheetSalaryTypeSpecification(); // \Swagger\Client\Model\TimesheetSalaryTypeSpecification | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->timesheetSalaryTypeSpecificationPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryTypeSpecificationApi->timesheetSalaryTypeSpecificationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetSalaryTypeSpecification**](../Model/TimesheetSalaryTypeSpecification.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetSalaryTypeSpecification**](../Model/ResponseWrapperTimesheetSalaryTypeSpecification.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetSalaryTypeSpecificationPut**
> \Swagger\Client\Model\ResponseWrapperTimesheetSalaryTypeSpecification timesheetSalaryTypeSpecificationPut($id, $body)

[BETA] Update a timesheet SalaryType Specification



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\TimesheetSalaryTypeSpecification(); // \Swagger\Client\Model\TimesheetSalaryTypeSpecification | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->timesheetSalaryTypeSpecificationPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryTypeSpecificationApi->timesheetSalaryTypeSpecificationPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\TimesheetSalaryTypeSpecification**](../Model/TimesheetSalaryTypeSpecification.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetSalaryTypeSpecification**](../Model/ResponseWrapperTimesheetSalaryTypeSpecification.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetSalaryTypeSpecificationSearch**
> \Swagger\Client\Model\ListResponseTimesheetSalaryTypeSpecification timesheetSalaryTypeSpecificationSearch($date_from, $date_to, $employee_id, $from, $count, $sorting, $fields)

[BETA] Get list of timesheet SalaryType Specifications



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$employee_id = 56; // int | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetSalaryTypeSpecificationSearch($date_from, $date_to, $employee_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryTypeSpecificationApi->timesheetSalaryTypeSpecificationSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **employee_id** | **int**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetSalaryTypeSpecification**](../Model/ListResponseTimesheetSalaryTypeSpecification.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

