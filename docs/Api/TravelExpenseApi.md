# Swagger\Client\TravelExpenseApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**travelExpenseApproveApprove**](TravelExpenseApi.md#travelExpenseApproveApprove) | **PUT** /travelExpense/:approve | Approve travel expenses.
[**travelExpenseAttachmentDeleteAttachment**](TravelExpenseApi.md#travelExpenseAttachmentDeleteAttachment) | **DELETE** /travelExpense/{travelExpenseId}/attachment | Delete attachment.
[**travelExpenseAttachmentDownloadAttachment**](TravelExpenseApi.md#travelExpenseAttachmentDownloadAttachment) | **GET** /travelExpense/{travelExpenseId}/attachment | Get attachment by travel expense ID.
[**travelExpenseAttachmentListUploadAttachments**](TravelExpenseApi.md#travelExpenseAttachmentListUploadAttachments) | **POST** /travelExpense/{travelExpenseId}/attachment/list | Upload multiple attachments to travel expense.
[**travelExpenseAttachmentUploadAttachment**](TravelExpenseApi.md#travelExpenseAttachmentUploadAttachment) | **POST** /travelExpense/{travelExpenseId}/attachment | Upload attachment to travel expense.
[**travelExpenseCopyCopy**](TravelExpenseApi.md#travelExpenseCopyCopy) | **PUT** /travelExpense/:copy | Copy travel expense.
[**travelExpenseCreateVouchersCreateVouchers**](TravelExpenseApi.md#travelExpenseCreateVouchersCreateVouchers) | **PUT** /travelExpense/:createVouchers | Create vouchers
[**travelExpenseDelete**](TravelExpenseApi.md#travelExpenseDelete) | **DELETE** /travelExpense/{id} | Delete travel expense.
[**travelExpenseDeliverDeliver**](TravelExpenseApi.md#travelExpenseDeliverDeliver) | **PUT** /travelExpense/:deliver | Deliver travel expenses.
[**travelExpenseGet**](TravelExpenseApi.md#travelExpenseGet) | **GET** /travelExpense/{id} | Get travel expense by ID.
[**travelExpensePost**](TravelExpenseApi.md#travelExpensePost) | **POST** /travelExpense | Create travel expense.
[**travelExpensePut**](TravelExpenseApi.md#travelExpensePut) | **PUT** /travelExpense/{id} | Update travel expense.
[**travelExpenseSearch**](TravelExpenseApi.md#travelExpenseSearch) | **GET** /travelExpense | Find travel expenses corresponding with sent data.
[**travelExpenseUnapproveUnapprove**](TravelExpenseApi.md#travelExpenseUnapproveUnapprove) | **PUT** /travelExpense/:unapprove | Unapprove travel expenses.
[**travelExpenseUndeliverUndeliver**](TravelExpenseApi.md#travelExpenseUndeliverUndeliver) | **PUT** /travelExpense/:undeliver | Undeliver travel expenses.


# **travelExpenseApproveApprove**
> \Swagger\Client\Model\ListResponseTravelExpense travelExpenseApproveApprove($id)

Approve travel expenses.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | ID of the elements

try {
    $result = $apiInstance->travelExpenseApproveApprove($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseApproveApprove: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseAttachmentDeleteAttachment**
> travelExpenseAttachmentDeleteAttachment($travel_expense_id, $version, $send_to_inbox, $split)

Delete attachment.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = 56; // int | ID of attachment containing the attachment to delete.
$version = 56; // int | Version of voucher containing the attachment to delete.
$send_to_inbox = false; // bool | Should the attachment be sent to inbox rather than deleted?
$split = false; // bool | If sendToInbox is true, should the attachment be split into one voucher per page?

try {
    $apiInstance->travelExpenseAttachmentDeleteAttachment($travel_expense_id, $version, $send_to_inbox, $split);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseAttachmentDeleteAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **int**| ID of attachment containing the attachment to delete. |
 **version** | **int**| Version of voucher containing the attachment to delete. | [optional]
 **send_to_inbox** | **bool**| Should the attachment be sent to inbox rather than deleted? | [optional] [default to false]
 **split** | **bool**| If sendToInbox is true, should the attachment be split into one voucher per page? | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseAttachmentDownloadAttachment**
> string travelExpenseAttachmentDownloadAttachment($travel_expense_id)

Get attachment by travel expense ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = 56; // int | Travel Expense ID from which PDF is downloaded.

try {
    $result = $apiInstance->travelExpenseAttachmentDownloadAttachment($travel_expense_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseAttachmentDownloadAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **int**| Travel Expense ID from which PDF is downloaded. |

### Return type

**string**

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseAttachmentListUploadAttachments**
> travelExpenseAttachmentListUploadAttachments($travel_expense_id, $body, $create_new_cost)

Upload multiple attachments to travel expense.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = 56; // int | Travel Expense ID to upload attachment to.
$body = new \Swagger\Client\Model\FormDataMultiPart(); // \Swagger\Client\Model\FormDataMultiPart | Multipart files
$create_new_cost = false; // bool | Create new cost row when you add the attachment

try {
    $apiInstance->travelExpenseAttachmentListUploadAttachments($travel_expense_id, $body, $create_new_cost);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseAttachmentListUploadAttachments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **int**| Travel Expense ID to upload attachment to. |
 **body** | [**\Swagger\Client\Model\FormDataMultiPart**](../Model/FormDataMultiPart.md)| Multipart files |
 **create_new_cost** | **bool**| Create new cost row when you add the attachment | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseAttachmentUploadAttachment**
> travelExpenseAttachmentUploadAttachment($travel_expense_id, $file, $create_new_cost)

Upload attachment to travel expense.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = 56; // int | Travel Expense ID to upload attachment to.
$file = "/path/to/file.txt"; // \SplFileObject | The file
$create_new_cost = false; // bool | Create new cost row when you add the attachment

try {
    $apiInstance->travelExpenseAttachmentUploadAttachment($travel_expense_id, $file, $create_new_cost);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseAttachmentUploadAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **int**| Travel Expense ID to upload attachment to. |
 **file** | **\SplFileObject**| The file |
 **create_new_cost** | **bool**| Create new cost row when you add the attachment | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseCopyCopy**
> \Swagger\Client\Model\ResponseWrapperTravelExpense travelExpenseCopyCopy($id)

Copy travel expense.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $result = $apiInstance->travelExpenseCopyCopy($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseCopyCopy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ResponseWrapperTravelExpense**](../Model/ResponseWrapperTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseCreateVouchersCreateVouchers**
> \Swagger\Client\Model\ListResponseTravelExpense travelExpenseCreateVouchersCreateVouchers($date, $id)

Create vouchers



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = "date_example"; // string | yyyy-MM-dd. Defaults to today.
$id = "id_example"; // string | ID of the elements

try {
    $result = $apiInstance->travelExpenseCreateVouchersCreateVouchers($date, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseCreateVouchersCreateVouchers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date** | **string**| yyyy-MM-dd. Defaults to today. |
 **id** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseDelete**
> travelExpenseDelete($id)

Delete travel expense.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->travelExpenseDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseDelete: ', $e->getMessage(), PHP_EOL;
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

# **travelExpenseDeliverDeliver**
> \Swagger\Client\Model\ListResponseTravelExpense travelExpenseDeliverDeliver($id)

Deliver travel expenses.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | ID of the elements

try {
    $result = $apiInstance->travelExpenseDeliverDeliver($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseDeliverDeliver: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseGet**
> \Swagger\Client\Model\ResponseWrapperTravelExpense travelExpenseGet($id, $fields)

Get travel expense by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->travelExpenseGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTravelExpense**](../Model/ResponseWrapperTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpensePost**
> \Swagger\Client\Model\ResponseWrapperTravelExpense travelExpensePost($body)

Create travel expense.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\TravelExpense(); // \Swagger\Client\Model\TravelExpense | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->travelExpensePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpensePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TravelExpense**](../Model/TravelExpense.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTravelExpense**](../Model/ResponseWrapperTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpensePut**
> \Swagger\Client\Model\ResponseWrapperTravelExpense travelExpensePut($id, $body)

Update travel expense.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\TravelExpense(); // \Swagger\Client\Model\TravelExpense | Partial object describing what should be updated

try {
    $result = $apiInstance->travelExpensePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpensePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\TravelExpense**](../Model/TravelExpense.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTravelExpense**](../Model/ResponseWrapperTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseSearch**
> \Swagger\Client\Model\ListResponseTravelExpense travelExpenseSearch($employee_id, $department_id, $project_id, $project_manager_id, $departure_date_from, $return_date_to, $state, $from, $count, $sorting, $fields)

Find travel expenses corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = "employee_id_example"; // string | Equals
$department_id = "department_id_example"; // string | Equals
$project_id = "project_id_example"; // string | Equals
$project_manager_id = "project_manager_id_example"; // string | Equals
$departure_date_from = "departure_date_from_example"; // string | From and including
$return_date_to = "return_date_to_example"; // string | To and excluding
$state = "ALL"; // string | category
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->travelExpenseSearch($employee_id, $department_id, $project_id, $project_manager_id, $departure_date_from, $return_date_to, $state, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **string**| Equals | [optional]
 **department_id** | **string**| Equals | [optional]
 **project_id** | **string**| Equals | [optional]
 **project_manager_id** | **string**| Equals | [optional]
 **departure_date_from** | **string**| From and including | [optional]
 **return_date_to** | **string**| To and excluding | [optional]
 **state** | **string**| category | [optional] [default to ALL]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseUnapproveUnapprove**
> \Swagger\Client\Model\ListResponseTravelExpense travelExpenseUnapproveUnapprove($id)

Unapprove travel expenses.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | ID of the elements

try {
    $result = $apiInstance->travelExpenseUnapproveUnapprove($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseUnapproveUnapprove: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseUndeliverUndeliver**
> \Swagger\Client\Model\ListResponseTravelExpense travelExpenseUndeliverUndeliver($id, $body)

Undeliver travel expenses.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | ID of the elements
$body = new \Swagger\Client\Model\TravelExpense(); // \Swagger\Client\Model\TravelExpense | Partial object describing what should be updated

try {
    $result = $apiInstance->travelExpenseUndeliverUndeliver($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->travelExpenseUndeliverUndeliver: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the elements | [optional]
 **body** | [**\Swagger\Client\Model\TravelExpense**](../Model/TravelExpense.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

