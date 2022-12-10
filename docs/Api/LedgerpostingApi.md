# Swagger\Client\LedgerpostingApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**ledgerPostingGet**](LedgerpostingApi.md#ledgerPostingGet) | **GET** /ledger/posting/{id} | Find postings by ID.
[**ledgerPostingOpenPostOpenPost**](LedgerpostingApi.md#ledgerPostingOpenPostOpenPost) | **GET** /ledger/posting/openPost | Find open posts corresponding with sent data.
[**ledgerPostingSearch**](LedgerpostingApi.md#ledgerPostingSearch) | **GET** /ledger/posting | Find postings corresponding with sent data.


# **ledgerPostingGet**
> \Swagger\Client\Model\ResponseWrapperPosting ledgerPostingGet($id, $fields)

Find postings by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpostingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerPostingGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpostingApi->ledgerPostingGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPosting**](../Model/ResponseWrapperPosting.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerPostingOpenPostOpenPost**
> \Swagger\Client\Model\ListResponsePosting ledgerPostingOpenPostOpenPost($date, $account_id, $supplier_id, $customer_id, $employee_id, $department_id, $project_id, $product_id, $account_number_from, $account_number_to, $from, $count, $sorting, $fields)

Find open posts corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpostingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = "date_example"; // string | Invoice date. Format is yyyy-MM-dd (to and excl.).
$account_id = 56; // int | Element ID
$supplier_id = 56; // int | Element ID
$customer_id = 56; // int | Element ID
$employee_id = 56; // int | Element ID
$department_id = 56; // int | Element ID
$project_id = 56; // int | Element ID
$product_id = 56; // int | Element ID
$account_number_from = 56; // int | Element ID
$account_number_to = 56; // int | Element ID
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerPostingOpenPostOpenPost($date, $account_id, $supplier_id, $customer_id, $employee_id, $department_id, $project_id, $product_id, $account_number_from, $account_number_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpostingApi->ledgerPostingOpenPostOpenPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date** | **string**| Invoice date. Format is yyyy-MM-dd (to and excl.). |
 **account_id** | **int**| Element ID | [optional]
 **supplier_id** | **int**| Element ID | [optional]
 **customer_id** | **int**| Element ID | [optional]
 **employee_id** | **int**| Element ID | [optional]
 **department_id** | **int**| Element ID | [optional]
 **project_id** | **int**| Element ID | [optional]
 **product_id** | **int**| Element ID | [optional]
 **account_number_from** | **int**| Element ID | [optional]
 **account_number_to** | **int**| Element ID | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePosting**](../Model/ListResponsePosting.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerPostingSearch**
> \Swagger\Client\Model\ListResponsePosting ledgerPostingSearch($date_from, $date_to, $open_postings, $account_id, $supplier_id, $customer_id, $employee_id, $department_id, $project_id, $product_id, $account_number_from, $account_number_to, $type, $from, $count, $sorting, $fields)

Find postings corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpostingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | Format is yyyy-MM-dd (from and incl.).
$date_to = "date_to_example"; // string | Format is yyyy-MM-dd (to and excl.).
$open_postings = "open_postings_example"; // string | Deprecated
$account_id = 56; // int | Element ID
$supplier_id = 56; // int | Element ID
$customer_id = 56; // int | Element ID
$employee_id = 56; // int | Element ID
$department_id = 56; // int | Element ID
$project_id = 56; // int | Element ID
$product_id = 56; // int | Element ID
$account_number_from = 56; // int | Element ID
$account_number_to = 56; // int | Element ID
$type = "type_example"; // string | Element ID
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerPostingSearch($date_from, $date_to, $open_postings, $account_id, $supplier_id, $customer_id, $employee_id, $department_id, $project_id, $product_id, $account_number_from, $account_number_to, $type, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpostingApi->ledgerPostingSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| Format is yyyy-MM-dd (from and incl.). |
 **date_to** | **string**| Format is yyyy-MM-dd (to and excl.). |
 **open_postings** | **string**| Deprecated | [optional]
 **account_id** | **int**| Element ID | [optional]
 **supplier_id** | **int**| Element ID | [optional]
 **customer_id** | **int**| Element ID | [optional]
 **employee_id** | **int**| Element ID | [optional]
 **department_id** | **int**| Element ID | [optional]
 **project_id** | **int**| Element ID | [optional]
 **product_id** | **int**| Element ID | [optional]
 **account_number_from** | **int**| Element ID | [optional]
 **account_number_to** | **int**| Element ID | [optional]
 **type** | **string**| Element ID | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePosting**](../Model/ListResponsePosting.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

