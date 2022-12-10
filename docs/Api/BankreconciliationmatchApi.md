# Swagger\Client\BankreconciliationmatchApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**bankReconciliationMatchCountCount**](BankreconciliationmatchApi.md#bankReconciliationMatchCountCount) | **GET** /bank/reconciliation/match/count | Get the total number of matches
[**bankReconciliationMatchDelete**](BankreconciliationmatchApi.md#bankReconciliationMatchDelete) | **DELETE** /bank/reconciliation/match/{id} | Delete a bank reconciliation match by ID.
[**bankReconciliationMatchGet**](BankreconciliationmatchApi.md#bankReconciliationMatchGet) | **GET** /bank/reconciliation/match/{id} | Get bank reconciliation match by ID.
[**bankReconciliationMatchPost**](BankreconciliationmatchApi.md#bankReconciliationMatchPost) | **POST** /bank/reconciliation/match | Create a bank reconciliation match.
[**bankReconciliationMatchPut**](BankreconciliationmatchApi.md#bankReconciliationMatchPut) | **PUT** /bank/reconciliation/match/{id} | Update a bank reconciliation match by ID.
[**bankReconciliationMatchQueryQuery**](BankreconciliationmatchApi.md#bankReconciliationMatchQueryQuery) | **GET** /bank/reconciliation/match/query | [INTERNAL] Wildcard search.
[**bankReconciliationMatchSearch**](BankreconciliationmatchApi.md#bankReconciliationMatchSearch) | **GET** /bank/reconciliation/match | Find bank reconciliation match corresponding with sent data.
[**bankReconciliationMatchSuggestSuggest**](BankreconciliationmatchApi.md#bankReconciliationMatchSuggestSuggest) | **PUT** /bank/reconciliation/match/:suggest | Suggest matches for a bank reconciliation by ID.
[**bankReconciliationMatchesCounterGet**](BankreconciliationmatchApi.md#bankReconciliationMatchesCounterGet) | **GET** /bank/reconciliation/matches/counter | [BETA] Get number of matches since last page access.
[**bankReconciliationMatchesCounterPost**](BankreconciliationmatchApi.md#bankReconciliationMatchesCounterPost) | **POST** /bank/reconciliation/matches/counter | [BETA] Reset the number of matches after the page has been accessed.


# **bankReconciliationMatchCountCount**
> \Swagger\Client\Model\ResponseWrapperInteger bankReconciliationMatchCountCount($bank_reconciliation_id, $fields)

Get the total number of matches



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bank_reconciliation_id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationMatchCountCount($bank_reconciliation_id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchCountCount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bank_reconciliation_id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperInteger**](../Model/ResponseWrapperInteger.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationMatchDelete**
> bankReconciliationMatchDelete($id)

Delete a bank reconciliation match by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->bankReconciliationMatchDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchDelete: ', $e->getMessage(), PHP_EOL;
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

# **bankReconciliationMatchGet**
> \Swagger\Client\Model\ResponseWrapperBankReconciliationMatch bankReconciliationMatchGet($id, $fields)

Get bank reconciliation match by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationMatchGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch**](../Model/ResponseWrapperBankReconciliationMatch.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationMatchPost**
> \Swagger\Client\Model\ResponseWrapperBankReconciliationMatch bankReconciliationMatchPost($body)

Create a bank reconciliation match.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\BankReconciliationMatch(); // \Swagger\Client\Model\BankReconciliationMatch | Partial object describing what should be updated

try {
    $result = $apiInstance->bankReconciliationMatchPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\BankReconciliationMatch**](../Model/BankReconciliationMatch.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch**](../Model/ResponseWrapperBankReconciliationMatch.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationMatchPut**
> \Swagger\Client\Model\ResponseWrapperBankReconciliationMatch bankReconciliationMatchPut($id, $body)

Update a bank reconciliation match by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\BankReconciliationMatch(); // \Swagger\Client\Model\BankReconciliationMatch | Partial object describing what should be updated

try {
    $result = $apiInstance->bankReconciliationMatchPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\BankReconciliationMatch**](../Model/BankReconciliationMatch.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch**](../Model/ResponseWrapperBankReconciliationMatch.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationMatchQueryQuery**
> \Swagger\Client\Model\ListResponseBankReconciliationMatch bankReconciliationMatchQueryQuery($bank_reconciliation_id, $approved, $count, $from, $sorting, $fields)

[INTERNAL] Wildcard search.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bank_reconciliation_id = 56; // int | The bank reconciliation id
$approved = true; // bool | Approved or unapproved matches
$count = 56; // int | Number of elements to return
$from = 0; // int | From index
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationMatchQueryQuery($bank_reconciliation_id, $approved, $count, $from, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchQueryQuery: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bank_reconciliation_id** | **int**| The bank reconciliation id | [optional]
 **approved** | **bool**| Approved or unapproved matches | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseBankReconciliationMatch**](../Model/ListResponseBankReconciliationMatch.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationMatchSearch**
> \Swagger\Client\Model\ListResponseBankReconciliationMatch bankReconciliationMatchSearch($id, $bank_reconciliation_id, $count, $approved, $from, $sorting, $fields)

Find bank reconciliation match corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$bank_reconciliation_id = "bank_reconciliation_id_example"; // string | List of bank reconciliation IDs
$count = 5000; // int | Number of elements to return
$approved = true; // bool | Approved or unapproved matches
$from = 0; // int | From index
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationMatchSearch($id, $bank_reconciliation_id, $count, $approved, $from, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **bank_reconciliation_id** | **string**| List of bank reconciliation IDs | [optional]
 **count** | **int**| Number of elements to return | [optional] [default to 5000]
 **approved** | **bool**| Approved or unapproved matches | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseBankReconciliationMatch**](../Model/ListResponseBankReconciliationMatch.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationMatchSuggestSuggest**
> \Swagger\Client\Model\ListResponseBankReconciliationMatch bankReconciliationMatchSuggestSuggest($bank_reconciliation_id)

Suggest matches for a bank reconciliation by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bank_reconciliation_id = 56; // int | Element ID

try {
    $result = $apiInstance->bankReconciliationMatchSuggestSuggest($bank_reconciliation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchSuggestSuggest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bank_reconciliation_id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ListResponseBankReconciliationMatch**](../Model/ListResponseBankReconciliationMatch.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationMatchesCounterGet**
> \Swagger\Client\Model\ResponseWrapperBankReconciliationMatchesCounter bankReconciliationMatchesCounterGet($bank_reconciliation_id, $fields)

[BETA] Get number of matches since last page access.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bank_reconciliation_id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationMatchesCounterGet($bank_reconciliation_id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchesCounterGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bank_reconciliation_id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliationMatchesCounter**](../Model/ResponseWrapperBankReconciliationMatchesCounter.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationMatchesCounterPost**
> bankReconciliationMatchesCounterPost($bank_reconciliation_id)

[BETA] Reset the number of matches after the page has been accessed.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationmatchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bank_reconciliation_id = 56; // int | Element ID

try {
    $apiInstance->bankReconciliationMatchesCounterPost($bank_reconciliation_id);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationmatchApi->bankReconciliationMatchesCounterPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bank_reconciliation_id** | **int**| Element ID |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

