# Swagger\Client\TimesheettimeClockApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**timesheetTimeClockGet**](TimesheettimeClockApi.md#timesheetTimeClockGet) | **GET** /timesheet/timeClock/{id} | Find time clock entry by ID.
[**timesheetTimeClockPresentGetPresent**](TimesheettimeClockApi.md#timesheetTimeClockPresentGetPresent) | **GET** /timesheet/timeClock/present | Find a user’s present running time clock.
[**timesheetTimeClockPut**](TimesheettimeClockApi.md#timesheetTimeClockPut) | **PUT** /timesheet/timeClock/{id} | Update time clock by ID.
[**timesheetTimeClockSearch**](TimesheettimeClockApi.md#timesheetTimeClockSearch) | **GET** /timesheet/timeClock | Find time clock entries corresponding with sent data.
[**timesheetTimeClockStartStart**](TimesheettimeClockApi.md#timesheetTimeClockStartStart) | **PUT** /timesheet/timeClock/:start | Start time clock.
[**timesheetTimeClockStopStop**](TimesheettimeClockApi.md#timesheetTimeClockStopStop) | **PUT** /timesheet/timeClock/{id}/:stop | Stop time clock.


# **timesheetTimeClockGet**
> \Swagger\Client\Model\ResponseWrapperTimeClock timesheetTimeClockGet($id, $fields)

Find time clock entry by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheettimeClockApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetTimeClockGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheettimeClockApi->timesheetTimeClockGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimeClock**](../Model/ResponseWrapperTimeClock.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetTimeClockPresentGetPresent**
> \Swagger\Client\Model\ResponseWrapperTimeClock timesheetTimeClockPresentGetPresent($employee_id, $fields)

Find a user’s present running time clock.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheettimeClockApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Employee ID. Defaults to ID of token owner.
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetTimeClockPresentGetPresent($employee_id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheettimeClockApi->timesheetTimeClockPresentGetPresent: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| Employee ID. Defaults to ID of token owner. | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimeClock**](../Model/ResponseWrapperTimeClock.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetTimeClockPut**
> \Swagger\Client\Model\ResponseWrapperTimeClock timesheetTimeClockPut($id, $body)

Update time clock by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheettimeClockApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\TimeClock(); // \Swagger\Client\Model\TimeClock | Partial object describing what should be updated

try {
    $result = $apiInstance->timesheetTimeClockPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheettimeClockApi->timesheetTimeClockPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\TimeClock**](../Model/TimeClock.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimeClock**](../Model/ResponseWrapperTimeClock.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetTimeClockSearch**
> \Swagger\Client\Model\ListResponseTimeClock timesheetTimeClockSearch($id, $employee_id, $project_id, $activity_id, $date_from, $date_to, $hour_id, $is_running, $from, $count, $sorting, $fields)

Find time clock entries corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheettimeClockApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$employee_id = "employee_id_example"; // string | List of IDs
$project_id = "project_id_example"; // string | List of IDs
$activity_id = "activity_id_example"; // string | List of IDs
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$hour_id = "hour_id_example"; // string | List of IDs
$is_running = true; // bool | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetTimeClockSearch($id, $employee_id, $project_id, $activity_id, $date_from, $date_to, $hour_id, $is_running, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheettimeClockApi->timesheetTimeClockSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **employee_id** | **string**| List of IDs | [optional]
 **project_id** | **string**| List of IDs | [optional]
 **activity_id** | **string**| List of IDs | [optional]
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **hour_id** | **string**| List of IDs | [optional]
 **is_running** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimeClock**](../Model/ListResponseTimeClock.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetTimeClockStartStart**
> \Swagger\Client\Model\ResponseWrapperTimeClock timesheetTimeClockStartStart($activity_id, $employee_id, $project_id, $date, $lunch_break_duration)

Start time clock.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheettimeClockApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$activity_id = 56; // int | Activity ID
$employee_id = 56; // int | Employee ID. Defaults to ID of token owner.
$project_id = 0; // int | Project ID
$date = "date_example"; // string | Optional. Default is today’s date
$lunch_break_duration = 8.14; // float | Equals

try {
    $result = $apiInstance->timesheetTimeClockStartStart($activity_id, $employee_id, $project_id, $date, $lunch_break_duration);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheettimeClockApi->timesheetTimeClockStartStart: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **activity_id** | **int**| Activity ID |
 **employee_id** | **int**| Employee ID. Defaults to ID of token owner. | [optional]
 **project_id** | **int**| Project ID | [optional] [default to 0]
 **date** | **string**| Optional. Default is today’s date | [optional]
 **lunch_break_duration** | **float**| Equals | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimeClock**](../Model/ResponseWrapperTimeClock.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetTimeClockStopStop**
> timesheetTimeClockStopStop($id, $version)

Stop time clock.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheettimeClockApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$version = 0; // int | Number of current version

try {
    $apiInstance->timesheetTimeClockStopStop($id, $version);
} catch (Exception $e) {
    echo 'Exception when calling TimesheettimeClockApi->timesheetTimeClockStopStop: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **version** | **int**| Number of current version | [optional] [default to 0]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

