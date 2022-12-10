# Swagger\Client\InvoicedetailsApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**invoiceDetailsGet**](InvoicedetailsApi.md#invoiceDetailsGet) | **GET** /invoice/details/{id} | Get ProjectInvoiceDetails by ID.
[**invoiceDetailsSearch**](InvoicedetailsApi.md#invoiceDetailsSearch) | **GET** /invoice/details | Find ProjectInvoiceDetails corresponding with sent data.


# **invoiceDetailsGet**
> \Swagger\Client\Model\ResponseWrapperProjectInvoiceDetails invoiceDetailsGet($id, $fields)

Get ProjectInvoiceDetails by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InvoicedetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->invoiceDetailsGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicedetailsApi->invoiceDetailsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectInvoiceDetails**](../Model/ResponseWrapperProjectInvoiceDetails.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **invoiceDetailsSearch**
> \Swagger\Client\Model\ListResponseProjectInvoiceDetails invoiceDetailsSearch($invoice_date_from, $invoice_date_to, $id, $from, $count, $sorting, $fields)

Find ProjectInvoiceDetails corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InvoicedetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoice_date_from = "invoice_date_from_example"; // string | From and including
$invoice_date_to = "invoice_date_to_example"; // string | To and excluding
$id = "id_example"; // string | List of IDs
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->invoiceDetailsSearch($invoice_date_from, $invoice_date_to, $id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvoicedetailsApi->invoiceDetailsSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invoice_date_from** | **string**| From and including |
 **invoice_date_to** | **string**| To and excluding |
 **id** | **string**| List of IDs | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectInvoiceDetails**](../Model/ListResponseProjectInvoiceDetails.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

