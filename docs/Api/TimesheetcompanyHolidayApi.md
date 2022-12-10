# Swagger\Client\TimesheetcompanyHolidayApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**timesheetCompanyHolidayDelete**](TimesheetcompanyHolidayApi.md#timesheetCompanyHolidayDelete) | **DELETE** /timesheet/companyHoliday/{id} | [BETA] Delete a company holiday
[**timesheetCompanyHolidayGet**](TimesheetcompanyHolidayApi.md#timesheetCompanyHolidayGet) | **GET** /timesheet/companyHoliday/{id} | [BETA] Get company holiday by its ID
[**timesheetCompanyHolidayPost**](TimesheetcompanyHolidayApi.md#timesheetCompanyHolidayPost) | **POST** /timesheet/companyHoliday | [BETA] Create a company holiday
[**timesheetCompanyHolidayPut**](TimesheetcompanyHolidayApi.md#timesheetCompanyHolidayPut) | **PUT** /timesheet/companyHoliday/{id} | [BETA] Update a company holiday
[**timesheetCompanyHolidaySearch**](TimesheetcompanyHolidayApi.md#timesheetCompanyHolidaySearch) | **GET** /timesheet/companyHoliday | [BETA] Search for company holidays by id or year.


# **timesheetCompanyHolidayDelete**
> timesheetCompanyHolidayDelete($id)

[BETA] Delete a company holiday



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetcompanyHolidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->timesheetCompanyHolidayDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetcompanyHolidayApi->timesheetCompanyHolidayDelete: ', $e->getMessage(), PHP_EOL;
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

# **timesheetCompanyHolidayGet**
> \Swagger\Client\Model\ResponseWrapperCompanyHolidays timesheetCompanyHolidayGet($id, $fields)

[BETA] Get company holiday by its ID



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetcompanyHolidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetCompanyHolidayGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetcompanyHolidayApi->timesheetCompanyHolidayGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCompanyHolidays**](../Model/ResponseWrapperCompanyHolidays.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetCompanyHolidayPost**
> \Swagger\Client\Model\ResponseWrapperCompanyHolidays timesheetCompanyHolidayPost($body)

[BETA] Create a company holiday



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetcompanyHolidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\CompanyHolidays(); // \Swagger\Client\Model\CompanyHolidays | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->timesheetCompanyHolidayPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetcompanyHolidayApi->timesheetCompanyHolidayPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\CompanyHolidays**](../Model/CompanyHolidays.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCompanyHolidays**](../Model/ResponseWrapperCompanyHolidays.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetCompanyHolidayPut**
> \Swagger\Client\Model\ResponseWrapperCompanyHolidays timesheetCompanyHolidayPut($id, $body)

[BETA] Update a company holiday



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetcompanyHolidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\CompanyHolidays(); // \Swagger\Client\Model\CompanyHolidays | Partial object describing what should be updated

try {
    $result = $apiInstance->timesheetCompanyHolidayPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetcompanyHolidayApi->timesheetCompanyHolidayPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\CompanyHolidays**](../Model/CompanyHolidays.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCompanyHolidays**](../Model/ResponseWrapperCompanyHolidays.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetCompanyHolidaySearch**
> \Swagger\Client\Model\ListResponseCompanyHolidays timesheetCompanyHolidaySearch($ids, $years, $from, $count, $sorting, $fields)

[BETA] Search for company holidays by id or year.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetcompanyHolidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements
$years = "years_example"; // string | A year `2020` for instance
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetCompanyHolidaySearch($ids, $years, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetcompanyHolidayApi->timesheetCompanyHolidaySearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| ID of the elements | [optional]
 **years** | **string**| A year &#x60;2020&#x60; for instance | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseCompanyHolidays**](../Model/ListResponseCompanyHolidays.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

