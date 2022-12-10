# Swagger\Client\TimesheetallocatedApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**timesheetAllocatedApproveApprove**](TimesheetallocatedApi.md#timesheetAllocatedApproveApprove) | **PUT** /timesheet/allocated/{id}/:approve | Only for allocated hours on the company&#39;s internal holiday/vacation activity. Mark the allocated hour entry as approved. The hours will be copied to the time sheet. A notification will be sent to the entry&#39;s employee if the entry&#39;s approval status or comment has changed.
[**timesheetAllocatedApproveListApproveList**](TimesheetallocatedApi.md#timesheetAllocatedApproveListApproveList) | **PUT** /timesheet/allocated/:approveList | Only for allocated hours on the company&#39;s internal holiday/vacation activity. Mark the allocated hour entry/entries as approved. The hours will be copied to the time sheet. Notifications will be sent to the entries&#39; employees if the entries&#39; approval statuses or comments have changed. If IDs are provided, the other args are ignored.
[**timesheetAllocatedDelete**](TimesheetallocatedApi.md#timesheetAllocatedDelete) | **DELETE** /timesheet/allocated/{id} | Delete allocated hour entry by ID.
[**timesheetAllocatedGet**](TimesheetallocatedApi.md#timesheetAllocatedGet) | **GET** /timesheet/allocated/{id} | Find allocated hour entry by ID.
[**timesheetAllocatedListPostList**](TimesheetallocatedApi.md#timesheetAllocatedListPostList) | **POST** /timesheet/allocated/list | Add new allocated hour entry. Multiple objects for several users can be sent in the same request. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries&#39; employees if the entries have comments.
[**timesheetAllocatedListPutList**](TimesheetallocatedApi.md#timesheetAllocatedListPutList) | **PUT** /timesheet/allocated/list | Update allocated hour entry. Multiple objects for different users can be sent in the same request. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries&#39; employees if the entries&#39; comments have changed.
[**timesheetAllocatedPost**](TimesheetallocatedApi.md#timesheetAllocatedPost) | **POST** /timesheet/allocated | Add new allocated hour entry. Only one entry per employee/date/activity/project combination is supported. Only holiday/vacation hours can receive comments. A notification will be sent to the entry&#39;s employee if the entry has a comment.
[**timesheetAllocatedPut**](TimesheetallocatedApi.md#timesheetAllocatedPut) | **PUT** /timesheet/allocated/{id} | Update allocated hour entry by ID. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. A notification will be sent to the entry&#39;s employee if the entry&#39;s comment has changed.
[**timesheetAllocatedSearch**](TimesheetallocatedApi.md#timesheetAllocatedSearch) | **GET** /timesheet/allocated | Find allocated hour entries corresponding with sent data.
[**timesheetAllocatedUnapproveListUnapproveList**](TimesheetallocatedApi.md#timesheetAllocatedUnapproveListUnapproveList) | **PUT** /timesheet/allocated/:unapproveList | Only for allocated hours on the company&#39;s internal holiday/vacation activity. Mark the allocated hour entry/entries as unapproved. Notifications will be sent to the entries&#39; employees if the entries&#39; approval statuses or comments have changed. If IDs are provided, the other args are ignored.
[**timesheetAllocatedUnapproveUnapprove**](TimesheetallocatedApi.md#timesheetAllocatedUnapproveUnapprove) | **PUT** /timesheet/allocated/{id}/:unapprove | Only for allocated hours on the company&#39;s internal holiday/vacation activity. Mark the allocated hour entry as unapproved. A notification will be sent to the entry&#39;s employee if the entry&#39;s approval status or comment has changed.


# **timesheetAllocatedApproveApprove**
> \Swagger\Client\Model\ResponseWrapperTimesheetAllocated timesheetAllocatedApproveApprove($id, $manager_comment)

Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as approved. The hours will be copied to the time sheet. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$manager_comment = "manager_comment_example"; // string | Comment to be added to the approved hour entry.

try {
    $result = $apiInstance->timesheetAllocatedApproveApprove($id, $manager_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedApproveApprove: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **manager_comment** | **string**| Comment to be added to the approved hour entry. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetAllocated**](../Model/ResponseWrapperTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetAllocatedApproveListApproveList**
> \Swagger\Client\Model\ListResponseTimesheetAllocated timesheetAllocatedApproveListApproveList($ids, $employee_ids, $date_from, $date_to, $manager_comment)

Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as approved. The hours will be copied to the time sheet. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | List of allocated hour entry IDs.
$employee_ids = "employee_ids_example"; // string | List of IDs. Defaults to ID of token owner.
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$manager_comment = "manager_comment_example"; // string | Comment to be added to all approved hour entries.

try {
    $result = $apiInstance->timesheetAllocatedApproveListApproveList($ids, $employee_ids, $date_from, $date_to, $manager_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedApproveListApproveList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| List of allocated hour entry IDs. | [optional]
 **employee_ids** | **string**| List of IDs. Defaults to ID of token owner. | [optional]
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **manager_comment** | **string**| Comment to be added to all approved hour entries. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetAllocated**](../Model/ListResponseTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetAllocatedDelete**
> timesheetAllocatedDelete($id, $version)

Delete allocated hour entry by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$version = 56; // int | Number of current version

try {
    $apiInstance->timesheetAllocatedDelete($id, $version);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedDelete: ', $e->getMessage(), PHP_EOL;
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

# **timesheetAllocatedGet**
> \Swagger\Client\Model\ResponseWrapperTimesheetAllocated timesheetAllocatedGet($id, $fields)

Find allocated hour entry by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetAllocatedGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetAllocated**](../Model/ResponseWrapperTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetAllocatedListPostList**
> \Swagger\Client\Model\ListResponseTimesheetAllocated timesheetAllocatedListPostList($body)

Add new allocated hour entry. Multiple objects for several users can be sent in the same request. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries have comments.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\TimesheetAllocated()); // \Swagger\Client\Model\TimesheetAllocated[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->timesheetAllocatedListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetAllocated[]**](../Model/TimesheetAllocated.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetAllocated**](../Model/ListResponseTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetAllocatedListPutList**
> \Swagger\Client\Model\ListResponseTimesheetAllocated timesheetAllocatedListPutList($body)

Update allocated hour entry. Multiple objects for different users can be sent in the same request. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries' comments have changed.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\TimesheetAllocated()); // \Swagger\Client\Model\TimesheetAllocated[] | List of allocated hour entry objects to update. Should have ID set.

try {
    $result = $apiInstance->timesheetAllocatedListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetAllocated[]**](../Model/TimesheetAllocated.md)| List of allocated hour entry objects to update. Should have ID set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetAllocated**](../Model/ListResponseTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetAllocatedPost**
> \Swagger\Client\Model\ResponseWrapperTimesheetAllocated timesheetAllocatedPost($body)

Add new allocated hour entry. Only one entry per employee/date/activity/project combination is supported. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry has a comment.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\TimesheetAllocated(); // \Swagger\Client\Model\TimesheetAllocated | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->timesheetAllocatedPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetAllocated**](../Model/TimesheetAllocated.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetAllocated**](../Model/ResponseWrapperTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetAllocatedPut**
> \Swagger\Client\Model\ResponseWrapperTimesheetAllocated timesheetAllocatedPut($id, $body)

Update allocated hour entry by ID. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry's comment has changed.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\TimesheetAllocated(); // \Swagger\Client\Model\TimesheetAllocated | Partial object describing what should be updated

try {
    $result = $apiInstance->timesheetAllocatedPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\TimesheetAllocated**](../Model/TimesheetAllocated.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetAllocated**](../Model/ResponseWrapperTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetAllocatedSearch**
> \Swagger\Client\Model\ListResponseTimesheetAllocated timesheetAllocatedSearch($ids, $employee_ids, $project_ids, $activity_ids, $date_from, $date_to, $from, $count, $sorting, $fields)

Find allocated hour entries corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | List of IDs
$employee_ids = "employee_ids_example"; // string | List of IDs
$project_ids = "project_ids_example"; // string | List of IDs
$activity_ids = "activity_ids_example"; // string | List of IDs
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetAllocatedSearch($ids, $employee_ids, $project_ids, $activity_ids, $date_from, $date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| List of IDs | [optional]
 **employee_ids** | **string**| List of IDs | [optional]
 **project_ids** | **string**| List of IDs | [optional]
 **activity_ids** | **string**| List of IDs | [optional]
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetAllocated**](../Model/ListResponseTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetAllocatedUnapproveListUnapproveList**
> \Swagger\Client\Model\ListResponseTimesheetAllocated timesheetAllocatedUnapproveListUnapproveList($ids, $employee_ids, $date_from, $date_to, $manager_comment)

Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as unapproved. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | List of allocated hour entry IDs.
$employee_ids = "employee_ids_example"; // string | List of IDs. Defaults to ID of token owner.
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$manager_comment = "manager_comment_example"; // string | Comment to be added to all unapproved hour entries.

try {
    $result = $apiInstance->timesheetAllocatedUnapproveListUnapproveList($ids, $employee_ids, $date_from, $date_to, $manager_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedUnapproveListUnapproveList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| List of allocated hour entry IDs. | [optional]
 **employee_ids** | **string**| List of IDs. Defaults to ID of token owner. | [optional]
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **manager_comment** | **string**| Comment to be added to all unapproved hour entries. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetAllocated**](../Model/ListResponseTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetAllocatedUnapproveUnapprove**
> \Swagger\Client\Model\ResponseWrapperTimesheetAllocated timesheetAllocatedUnapproveUnapprove($id, $manager_comment)

Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as unapproved. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetallocatedApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$manager_comment = "manager_comment_example"; // string | Comment to be added to the unapproved hour entry.

try {
    $result = $apiInstance->timesheetAllocatedUnapproveUnapprove($id, $manager_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetallocatedApi->timesheetAllocatedUnapproveUnapprove: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **manager_comment** | **string**| Comment to be added to the unapproved hour entry. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetAllocated**](../Model/ResponseWrapperTimesheetAllocated.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

