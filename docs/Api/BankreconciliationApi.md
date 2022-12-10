# Swagger\Client\BankreconciliationApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**bankReconciliationAdjustmentAdjustment**](BankreconciliationApi.md#bankReconciliationAdjustmentAdjustment) | **PUT** /bank/reconciliation/{id}/:adjustment | Add an adjustment to reconciliation by ID.
[**bankReconciliationClosedWithUnmatchedTransactionsClosedWithUnmatchedTransactions**](BankreconciliationApi.md#bankReconciliationClosedWithUnmatchedTransactionsClosedWithUnmatchedTransactions) | **GET** /bank/reconciliation/closedWithUnmatchedTransactions | Get the last closed reconciliation with unmached transactions by account ID.
[**bankReconciliationDelete**](BankreconciliationApi.md#bankReconciliationDelete) | **DELETE** /bank/reconciliation/{id} | Delete bank reconciliation by ID.
[**bankReconciliationGet**](BankreconciliationApi.md#bankReconciliationGet) | **GET** /bank/reconciliation/{id} | Get bank reconciliation.
[**bankReconciliationLastClosedLastClosed**](BankreconciliationApi.md#bankReconciliationLastClosedLastClosed) | **GET** /bank/reconciliation/&gt;lastClosed | Get last closed reconciliation by account ID.
[**bankReconciliationLastLast**](BankreconciliationApi.md#bankReconciliationLastLast) | **GET** /bank/reconciliation/&gt;last | Get the last created reconciliation by account ID.
[**bankReconciliationPost**](BankreconciliationApi.md#bankReconciliationPost) | **POST** /bank/reconciliation | Post a bank reconciliation.
[**bankReconciliationPut**](BankreconciliationApi.md#bankReconciliationPut) | **PUT** /bank/reconciliation/{id} | Update a bank reconciliation.
[**bankReconciliationSearch**](BankreconciliationApi.md#bankReconciliationSearch) | **GET** /bank/reconciliation | Find bank reconciliation corresponding with sent data.


# **bankReconciliationAdjustmentAdjustment**
> \Swagger\Client\Model\ListResponseBankReconciliationAdjustment bankReconciliationAdjustmentAdjustment($id, $body)

Add an adjustment to reconciliation by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = array(new \Swagger\Client\Model\BankReconciliationAdjustment()); // \Swagger\Client\Model\BankReconciliationAdjustment[] | Adjustments

try {
    $result = $apiInstance->bankReconciliationAdjustmentAdjustment($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationApi->bankReconciliationAdjustmentAdjustment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\BankReconciliationAdjustment[]**](../Model/BankReconciliationAdjustment.md)| Adjustments | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseBankReconciliationAdjustment**](../Model/ListResponseBankReconciliationAdjustment.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationClosedWithUnmatchedTransactionsClosedWithUnmatchedTransactions**
> \Swagger\Client\Model\ResponseWrapperBankReconciliation bankReconciliationClosedWithUnmatchedTransactionsClosedWithUnmatchedTransactions($account_id, $start, $fields)

Get the last closed reconciliation with unmached transactions by account ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 56; // int | Account ID
$start = "start_example"; // string | Format is yyyy-MM-dd
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationClosedWithUnmatchedTransactionsClosedWithUnmatchedTransactions($account_id, $start, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationApi->bankReconciliationClosedWithUnmatchedTransactionsClosedWithUnmatchedTransactions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **int**| Account ID |
 **start** | **string**| Format is yyyy-MM-dd | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliation**](../Model/ResponseWrapperBankReconciliation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationDelete**
> bankReconciliationDelete($id)

Delete bank reconciliation by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->bankReconciliationDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationApi->bankReconciliationDelete: ', $e->getMessage(), PHP_EOL;
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

# **bankReconciliationGet**
> \Swagger\Client\Model\ResponseWrapperBankReconciliation bankReconciliationGet($id, $fields)

Get bank reconciliation.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationApi->bankReconciliationGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliation**](../Model/ResponseWrapperBankReconciliation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationLastClosedLastClosed**
> \Swagger\Client\Model\ResponseWrapperBankReconciliation bankReconciliationLastClosedLastClosed($account_id, $after, $fields)

Get last closed reconciliation by account ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 56; // int | Account ID
$after = "after_example"; // string | Format is yyyy-MM-dd
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationLastClosedLastClosed($account_id, $after, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationApi->bankReconciliationLastClosedLastClosed: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **int**| Account ID |
 **after** | **string**| Format is yyyy-MM-dd | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliation**](../Model/ResponseWrapperBankReconciliation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationLastLast**
> \Swagger\Client\Model\ResponseWrapperBankReconciliation bankReconciliationLastLast($account_id, $fields)

Get the last created reconciliation by account ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 56; // int | Account ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationLastLast($account_id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationApi->bankReconciliationLastLast: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **account_id** | **int**| Account ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliation**](../Model/ResponseWrapperBankReconciliation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationPost**
> \Swagger\Client\Model\ResponseWrapperBankReconciliation bankReconciliationPost($body)

Post a bank reconciliation.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\BankReconciliation(); // \Swagger\Client\Model\BankReconciliation | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->bankReconciliationPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationApi->bankReconciliationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\BankReconciliation**](../Model/BankReconciliation.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliation**](../Model/ResponseWrapperBankReconciliation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationPut**
> \Swagger\Client\Model\ResponseWrapperBankReconciliation bankReconciliationPut($id, $body)

Update a bank reconciliation.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\BankReconciliation(); // \Swagger\Client\Model\BankReconciliation | Partial object describing what should be updated

try {
    $result = $apiInstance->bankReconciliationPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationApi->bankReconciliationPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\BankReconciliation**](../Model/BankReconciliation.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliation**](../Model/ResponseWrapperBankReconciliation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationSearch**
> \Swagger\Client\Model\ListResponseBankReconciliation bankReconciliationSearch($id, $accounting_period_id, $account_id, $from, $count, $sorting, $fields)

Find bank reconciliation corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$accounting_period_id = "accounting_period_id_example"; // string | List of IDs
$account_id = "account_id_example"; // string | List of IDs
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationSearch($id, $accounting_period_id, $account_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationApi->bankReconciliationSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **accounting_period_id** | **string**| List of IDs | [optional]
 **account_id** | **string**| List of IDs | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseBankReconciliation**](../Model/ListResponseBankReconciliation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

