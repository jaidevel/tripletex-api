# Swagger\Client\ReminderApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**reminderGet**](ReminderApi.md#reminderGet) | **GET** /reminder/{id} | Get reminder by ID.
[**reminderPdfDownloadPdf**](ReminderApi.md#reminderPdfDownloadPdf) | **GET** /reminder/{reminderId}/pdf | Get reminder document by reminder ID.
[**reminderSearch**](ReminderApi.md#reminderSearch) | **GET** /reminder | Find reminders corresponding with sent data.


# **reminderGet**
> \Swagger\Client\Model\ResponseWrapperReminder reminderGet($id, $fields)

Get reminder by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ReminderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->reminderGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReminderApi->reminderGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperReminder**](../Model/ResponseWrapperReminder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reminderPdfDownloadPdf**
> string reminderPdfDownloadPdf($reminder_id)

Get reminder document by reminder ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ReminderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$reminder_id = 56; // int | Reminder ID from which PDF is downloaded.

try {
    $result = $apiInstance->reminderPdfDownloadPdf($reminder_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReminderApi->reminderPdfDownloadPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **reminder_id** | **int**| Reminder ID from which PDF is downloaded. |

### Return type

**string**

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reminderSearch**
> \Swagger\Client\Model\ListResponseReminder reminderSearch($date_from, $date_to, $id, $term_of_payment_to, $term_of_payment_from, $invoice_id, $customer_id, $from, $count, $sorting, $fields)

Find reminders corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ReminderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$id = "id_example"; // string | List of IDs
$term_of_payment_to = "term_of_payment_to_example"; // string | To and excluding
$term_of_payment_from = "term_of_payment_from_example"; // string | From and including
$invoice_id = 56; // int | Equals
$customer_id = 56; // int | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->reminderSearch($date_from, $date_to, $id, $term_of_payment_to, $term_of_payment_from, $invoice_id, $customer_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReminderApi->reminderSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| From and including |
 **date_to** | **string**| To and excluding |
 **id** | **string**| List of IDs | [optional]
 **term_of_payment_to** | **string**| To and excluding | [optional]
 **term_of_payment_from** | **string**| From and including | [optional]
 **invoice_id** | **int**| Equals | [optional]
 **customer_id** | **int**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseReminder**](../Model/ListResponseReminder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

