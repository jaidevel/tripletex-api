# Swagger\Client\TimesheetweekApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**timesheetWeekApproveApprove**](TimesheetweekApi.md#timesheetWeekApproveApprove) | **PUT** /timesheet/week/:approve | Approve week. By ID or (ISO-8601 week and employeeId combination).
[**timesheetWeekCompleteComplete**](TimesheetweekApi.md#timesheetWeekCompleteComplete) | **PUT** /timesheet/week/:complete | Complete week. By ID or (ISO-8601 week and employeeId combination).
[**timesheetWeekReopenReopen**](TimesheetweekApi.md#timesheetWeekReopenReopen) | **PUT** /timesheet/week/:reopen | Reopen week. By ID or (ISO-8601 week and employeeId combination).
[**timesheetWeekSearch**](TimesheetweekApi.md#timesheetWeekSearch) | **GET** /timesheet/week | Find weekly status By ID, week/year combination, employeeId. or an approver
[**timesheetWeekUnapproveUnapprove**](TimesheetweekApi.md#timesheetWeekUnapproveUnapprove) | **PUT** /timesheet/week/:unapprove | Unapprove week. By ID or (ISO-8601 week and employeeId combination).


# **timesheetWeekApproveApprove**
> \Swagger\Client\Model\ResponseWrapperWeek timesheetWeekApproveApprove($id, $employee_id, $week_year)

Approve week. By ID or (ISO-8601 week and employeeId combination).



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetweekApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Equals
$employee_id = 56; // int | Equals
$week_year = "2018-12"; // string | ISO-8601 week-year

try {
    $result = $apiInstance->timesheetWeekApproveApprove($id, $employee_id, $week_year);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetweekApi->timesheetWeekApproveApprove: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Equals | [optional]
 **employee_id** | **int**| Equals | [optional]
 **week_year** | **string**| ISO-8601 week-year | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperWeek**](../Model/ResponseWrapperWeek.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetWeekCompleteComplete**
> \Swagger\Client\Model\ResponseWrapperWeek timesheetWeekCompleteComplete($id, $employee_id, $week_year)

Complete week. By ID or (ISO-8601 week and employeeId combination).



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetweekApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Equals
$employee_id = 56; // int | Equals
$week_year = "2018-12"; // string | ISO-8601 week-year

try {
    $result = $apiInstance->timesheetWeekCompleteComplete($id, $employee_id, $week_year);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetweekApi->timesheetWeekCompleteComplete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Equals | [optional]
 **employee_id** | **int**| Equals | [optional]
 **week_year** | **string**| ISO-8601 week-year | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperWeek**](../Model/ResponseWrapperWeek.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetWeekReopenReopen**
> \Swagger\Client\Model\ResponseWrapperWeek timesheetWeekReopenReopen($id, $employee_id, $week_year)

Reopen week. By ID or (ISO-8601 week and employeeId combination).



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetweekApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Equals
$employee_id = 56; // int | Equals
$week_year = "2018-12"; // string | ISO-8601 week-year

try {
    $result = $apiInstance->timesheetWeekReopenReopen($id, $employee_id, $week_year);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetweekApi->timesheetWeekReopenReopen: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Equals | [optional]
 **employee_id** | **int**| Equals | [optional]
 **week_year** | **string**| ISO-8601 week-year | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperWeek**](../Model/ResponseWrapperWeek.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetWeekSearch**
> \Swagger\Client\Model\ListResponseWeek timesheetWeekSearch($ids, $employee_ids, $week_year, $approved_by, $from, $count, $sorting, $fields)

Find weekly status By ID, week/year combination, employeeId. or an approver



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetweekApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | List of IDs
$employee_ids = "employee_ids_example"; // string | List of IDs
$week_year = "2018-12"; // string | ISO-8601 week-year
$approved_by = 56; // int | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetWeekSearch($ids, $employee_ids, $week_year, $approved_by, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetweekApi->timesheetWeekSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| List of IDs | [optional]
 **employee_ids** | **string**| List of IDs | [optional]
 **week_year** | **string**| ISO-8601 week-year | [optional]
 **approved_by** | **int**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseWeek**](../Model/ListResponseWeek.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetWeekUnapproveUnapprove**
> \Swagger\Client\Model\ResponseWrapperWeek timesheetWeekUnapproveUnapprove($id, $employee_id, $week_year)

Unapprove week. By ID or (ISO-8601 week and employeeId combination).



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetweekApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Equals
$employee_id = 56; // int | Equals
$week_year = "2018-12"; // string | ISO-8601 week-year

try {
    $result = $apiInstance->timesheetWeekUnapproveUnapprove($id, $employee_id, $week_year);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetweekApi->timesheetWeekUnapproveUnapprove: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Equals | [optional]
 **employee_id** | **int**| Equals | [optional]
 **week_year** | **string**| ISO-8601 week-year | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperWeek**](../Model/ResponseWrapperWeek.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

