# Swagger\Client\ProjectperiodApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**projectPeriodBudgetStatusGetBudgetStatus**](ProjectperiodApi.md#projectPeriodBudgetStatusGetBudgetStatus) | **GET** /project/{id}/period/budgetStatus | Get the budget status for the project period
[**projectPeriodHourlistReportHourlistReport**](ProjectperiodApi.md#projectPeriodHourlistReportHourlistReport) | **GET** /project/{id}/period/hourlistReport | Find hourlist report by project period.
[**projectPeriodInvoicedInvoiced**](ProjectperiodApi.md#projectPeriodInvoicedInvoiced) | **GET** /project/{id}/period/invoiced | Find invoiced info by project period.
[**projectPeriodInvoicingReserveInvoicingReserve**](ProjectperiodApi.md#projectPeriodInvoicingReserveInvoicingReserve) | **GET** /project/{id}/period/invoicingReserve | Find invoicing reserve by project period.
[**projectPeriodMonthlyStatusMonthlyStatus**](ProjectperiodApi.md#projectPeriodMonthlyStatusMonthlyStatus) | **GET** /project/{id}/period/monthlyStatus | Find overall status by project period.
[**projectPeriodOverallStatusOverallStatus**](ProjectperiodApi.md#projectPeriodOverallStatusOverallStatus) | **GET** /project/{id}/period/overallStatus | Find overall status by project period.


# **projectPeriodBudgetStatusGetBudgetStatus**
> \Swagger\Client\Model\ResponseWrapperProjectBudgetStatus projectPeriodBudgetStatusGetBudgetStatus($id, $fields)

Get the budget status for the project period



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectperiodApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectPeriodBudgetStatusGetBudgetStatus($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectperiodApi->projectPeriodBudgetStatusGetBudgetStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectBudgetStatus**](../Model/ResponseWrapperProjectBudgetStatus.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectPeriodHourlistReportHourlistReport**
> \Swagger\Client\Model\ResponseWrapperProjectPeriodHourlyReport projectPeriodHourlistReportHourlistReport($date_from, $date_to, $id, $fields)

Find hourlist report by project period.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectperiodApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | Format is yyyy-MM-dd (from and incl.).
$date_to = "date_to_example"; // string | Format is yyyy-MM-dd (to and excl.).
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectPeriodHourlistReportHourlistReport($date_from, $date_to, $id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectperiodApi->projectPeriodHourlistReportHourlistReport: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| Format is yyyy-MM-dd (from and incl.). |
 **date_to** | **string**| Format is yyyy-MM-dd (to and excl.). |
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectPeriodHourlyReport**](../Model/ResponseWrapperProjectPeriodHourlyReport.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectPeriodInvoicedInvoiced**
> \Swagger\Client\Model\ResponseWrapperProjectPeriodInvoiced projectPeriodInvoicedInvoiced($date_from, $date_to, $id, $fields)

Find invoiced info by project period.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectperiodApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | Format is yyyy-MM-dd (from and incl.).
$date_to = "date_to_example"; // string | Format is yyyy-MM-dd (to and excl.).
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectPeriodInvoicedInvoiced($date_from, $date_to, $id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectperiodApi->projectPeriodInvoicedInvoiced: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| Format is yyyy-MM-dd (from and incl.). |
 **date_to** | **string**| Format is yyyy-MM-dd (to and excl.). |
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectPeriodInvoiced**](../Model/ResponseWrapperProjectPeriodInvoiced.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectPeriodInvoicingReserveInvoicingReserve**
> \Swagger\Client\Model\ResponseWrapperProjectPeriodInvoicingReserve projectPeriodInvoicingReserveInvoicingReserve($date_from, $date_to, $id, $fields)

Find invoicing reserve by project period.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectperiodApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | Format is yyyy-MM-dd (from and incl.).
$date_to = "date_to_example"; // string | Format is yyyy-MM-dd (to and excl.).
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectPeriodInvoicingReserveInvoicingReserve($date_from, $date_to, $id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectperiodApi->projectPeriodInvoicingReserveInvoicingReserve: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| Format is yyyy-MM-dd (from and incl.). |
 **date_to** | **string**| Format is yyyy-MM-dd (to and excl.). |
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectPeriodInvoicingReserve**](../Model/ResponseWrapperProjectPeriodInvoicingReserve.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectPeriodMonthlyStatusMonthlyStatus**
> \Swagger\Client\Model\ListResponseProjectPeriodMonthlyStatus projectPeriodMonthlyStatusMonthlyStatus($date_from, $date_to, $id, $from, $count, $sorting, $fields)

Find overall status by project period.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectperiodApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | Format is yyyy-MM-dd (from and incl.).
$date_to = "date_to_example"; // string | Format is yyyy-MM-dd (to and excl.).
$id = 56; // int | Element ID
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectPeriodMonthlyStatusMonthlyStatus($date_from, $date_to, $id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectperiodApi->projectPeriodMonthlyStatusMonthlyStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| Format is yyyy-MM-dd (from and incl.). |
 **date_to** | **string**| Format is yyyy-MM-dd (to and excl.). |
 **id** | **int**| Element ID |
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectPeriodMonthlyStatus**](../Model/ListResponseProjectPeriodMonthlyStatus.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectPeriodOverallStatusOverallStatus**
> \Swagger\Client\Model\ResponseWrapperProjectPeriodOverallStatus projectPeriodOverallStatusOverallStatus($date_from, $date_to, $id, $fields)

Find overall status by project period.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectperiodApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | Format is yyyy-MM-dd (from and incl.).
$date_to = "date_to_example"; // string | Format is yyyy-MM-dd (to and excl.).
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectPeriodOverallStatusOverallStatus($date_from, $date_to, $id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectperiodApi->projectPeriodOverallStatusOverallStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| Format is yyyy-MM-dd (from and incl.). |
 **date_to** | **string**| Format is yyyy-MM-dd (to and excl.). |
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectPeriodOverallStatus**](../Model/ResponseWrapperProjectPeriodOverallStatus.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

