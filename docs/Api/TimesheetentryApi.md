# Swagger\Client\TimesheetentryApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**timesheetEntryDelete**](TimesheetentryApi.md#timesheetEntryDelete) | **DELETE** /timesheet/entry/{id} | Delete timesheet entry by ID.
[**timesheetEntryGet**](TimesheetentryApi.md#timesheetEntryGet) | **GET** /timesheet/entry/{id} | Find timesheet entry by ID.
[**timesheetEntryListPostList**](TimesheetentryApi.md#timesheetEntryListPostList) | **POST** /timesheet/entry/list | Add new timesheet entry. Multiple objects for several users can be sent in the same request.
[**timesheetEntryListPutList**](TimesheetentryApi.md#timesheetEntryListPutList) | **PUT** /timesheet/entry/list | Update timesheet entry. Multiple objects for different users can be sent in the same request.
[**timesheetEntryPost**](TimesheetentryApi.md#timesheetEntryPost) | **POST** /timesheet/entry | Add new timesheet entry. Only one entry per employee/date/activity/project combination is supported.
[**timesheetEntryPut**](TimesheetentryApi.md#timesheetEntryPut) | **PUT** /timesheet/entry/{id} | Update timesheet entry by ID. Note: Timesheet entry object fields which are present but not set, or set to 0, will be nulled.
[**timesheetEntryRecentActivitiesGetRecentActivities**](TimesheetentryApi.md#timesheetEntryRecentActivitiesGetRecentActivities) | **GET** /timesheet/entry/&gt;recentActivities | Find recently used timesheet activities.
[**timesheetEntryRecentProjectsGetRecentProjects**](TimesheetentryApi.md#timesheetEntryRecentProjectsGetRecentProjects) | **GET** /timesheet/entry/&gt;recentProjects | Find projects with recent activities (timesheet entry registered).
[**timesheetEntrySearch**](TimesheetentryApi.md#timesheetEntrySearch) | **GET** /timesheet/entry | Find timesheet entry corresponding with sent data.
[**timesheetEntryTotalHoursGetTotalHours**](TimesheetentryApi.md#timesheetEntryTotalHoursGetTotalHours) | **GET** /timesheet/entry/&gt;totalHours | Find total hours registered on an employee in a specific period.


# **timesheetEntryDelete**
> timesheetEntryDelete($id, $version)

Delete timesheet entry by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$version = 56; // int | Number of current version

try {
    $apiInstance->timesheetEntryDelete($id, $version);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntryDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **version** | **int**| Number of current version | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetEntryGet**
> \Swagger\Client\Model\ResponseWrapperTimesheetEntry timesheetEntryGet($id, $fields)

Find timesheet entry by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetEntryGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntryGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetEntry**](../Model/ResponseWrapperTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetEntryListPostList**
> \Swagger\Client\Model\ListResponseTimesheetEntry timesheetEntryListPostList($body)

Add new timesheet entry. Multiple objects for several users can be sent in the same request.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\TimesheetEntry()); // \Swagger\Client\Model\TimesheetEntry[] | List of timesheet entry objects

try {
    $result = $apiInstance->timesheetEntryListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntryListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetEntry[]**](../Model/TimesheetEntry.md)| List of timesheet entry objects | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetEntry**](../Model/ListResponseTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetEntryListPutList**
> \Swagger\Client\Model\ListResponseTimesheetEntry timesheetEntryListPutList($body)

Update timesheet entry. Multiple objects for different users can be sent in the same request.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\TimesheetEntry()); // \Swagger\Client\Model\TimesheetEntry[] | List of timesheet entry objects to update

try {
    $result = $apiInstance->timesheetEntryListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntryListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetEntry[]**](../Model/TimesheetEntry.md)| List of timesheet entry objects to update | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetEntry**](../Model/ListResponseTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetEntryPost**
> \Swagger\Client\Model\ResponseWrapperTimesheetEntry timesheetEntryPost($body)

Add new timesheet entry. Only one entry per employee/date/activity/project combination is supported.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\TimesheetEntry(); // \Swagger\Client\Model\TimesheetEntry | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->timesheetEntryPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntryPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetEntry**](../Model/TimesheetEntry.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetEntry**](../Model/ResponseWrapperTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetEntryPut**
> \Swagger\Client\Model\ResponseWrapperTimesheetEntry timesheetEntryPut($id, $body)

Update timesheet entry by ID. Note: Timesheet entry object fields which are present but not set, or set to 0, will be nulled.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\TimesheetEntry(); // \Swagger\Client\Model\TimesheetEntry | Partial object describing what should be updated

try {
    $result = $apiInstance->timesheetEntryPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntryPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\TimesheetEntry**](../Model/TimesheetEntry.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetEntry**](../Model/ResponseWrapperTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetEntryRecentActivitiesGetRecentActivities**
> \Swagger\Client\Model\ListResponseActivity timesheetEntryRecentActivitiesGetRecentActivities($project_id, $employee_id, $from, $count, $sorting, $fields)

Find recently used timesheet activities.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 56; // int | ID of project to find activities for
$employee_id = 56; // int | ID of employee to find activities for. Defaults to ID of token owner.
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetEntryRecentActivitiesGetRecentActivities($project_id, $employee_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntryRecentActivitiesGetRecentActivities: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**| ID of project to find activities for |
 **employee_id** | **int**| ID of employee to find activities for. Defaults to ID of token owner. | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseActivity**](../Model/ListResponseActivity.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetEntryRecentProjectsGetRecentProjects**
> \Swagger\Client\Model\ListResponseProject timesheetEntryRecentProjectsGetRecentProjects($employee_id, $from, $count, $sorting, $fields)

Find projects with recent activities (timesheet entry registered).



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | ID of employee with recent project hours Defaults to ID of token owner.
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetEntryRecentProjectsGetRecentProjects($employee_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntryRecentProjectsGetRecentProjects: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| ID of employee with recent project hours Defaults to ID of token owner. | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProject**](../Model/ListResponseProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetEntrySearch**
> \Swagger\Client\Model\TimesheetEntrySearchResponse timesheetEntrySearch($date_from, $date_to, $id, $employee_id, $project_id, $activity_id, $comment, $from, $count, $sorting, $fields)

Find timesheet entry corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$id = "id_example"; // string | List of IDs
$employee_id = "employee_id_example"; // string | List of IDs
$project_id = "project_id_example"; // string | List of IDs
$activity_id = "activity_id_example"; // string | List of IDs
$comment = "comment_example"; // string | Containing
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetEntrySearch($date_from, $date_to, $id, $employee_id, $project_id, $activity_id, $comment, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntrySearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| From and including |
 **date_to** | **string**| To and excluding |
 **id** | **string**| List of IDs | [optional]
 **employee_id** | **string**| List of IDs | [optional]
 **project_id** | **string**| List of IDs | [optional]
 **activity_id** | **string**| List of IDs | [optional]
 **comment** | **string**| Containing | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\TimesheetEntrySearchResponse**](../Model/TimesheetEntrySearchResponse.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetEntryTotalHoursGetTotalHours**
> \Swagger\Client\Model\ResponseWrapperBigDecimal timesheetEntryTotalHoursGetTotalHours($employee_id, $start_date, $end_date, $fields)

Find total hours registered on an employee in a specific period.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | ID of employee to find hours for. Defaults to ID of token owner.
$start_date = "start_date_example"; // string | Format is yyyy-MM-dd (from and incl.). Defaults to today.
$end_date = "end_date_example"; // string | Format is yyyy-MM-dd (to and excl.). Defaults to tomorrow.
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetEntryTotalHoursGetTotalHours($employee_id, $start_date, $end_date, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->timesheetEntryTotalHoursGetTotalHours: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| ID of employee to find hours for. Defaults to ID of token owner. | [optional]
 **start_date** | **string**| Format is yyyy-MM-dd (from and incl.). Defaults to today. | [optional]
 **end_date** | **string**| Format is yyyy-MM-dd (to and excl.). Defaults to tomorrow. | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBigDecimal**](../Model/ResponseWrapperBigDecimal.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

