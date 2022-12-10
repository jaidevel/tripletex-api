# Swagger\Client\LedgeraccountApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**ledgerAccountDelete**](LedgeraccountApi.md#ledgerAccountDelete) | **DELETE** /ledger/account/{id} | Delete account.
[**ledgerAccountGet**](LedgeraccountApi.md#ledgerAccountGet) | **GET** /ledger/account/{id} | Get account by ID.
[**ledgerAccountListDeleteByIds**](LedgeraccountApi.md#ledgerAccountListDeleteByIds) | **DELETE** /ledger/account/list | Delete multiple accounts.
[**ledgerAccountListPostList**](LedgeraccountApi.md#ledgerAccountListPostList) | **POST** /ledger/account/list | Create several accounts.
[**ledgerAccountListPutList**](LedgeraccountApi.md#ledgerAccountListPutList) | **PUT** /ledger/account/list | Update multiple accounts.
[**ledgerAccountPost**](LedgeraccountApi.md#ledgerAccountPost) | **POST** /ledger/account | Create a new account.
[**ledgerAccountPut**](LedgeraccountApi.md#ledgerAccountPut) | **PUT** /ledger/account/{id} | Update account.
[**ledgerAccountSearch**](LedgeraccountApi.md#ledgerAccountSearch) | **GET** /ledger/account | Find accounts corresponding with sent data.


# **ledgerAccountDelete**
> ledgerAccountDelete($id)

Delete account.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->ledgerAccountDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling LedgeraccountApi->ledgerAccountDelete: ', $e->getMessage(), PHP_EOL;
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

# **ledgerAccountGet**
> \Swagger\Client\Model\ResponseWrapperAccount ledgerAccountGet($id, $fields)

Get account by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerAccountGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgeraccountApi->ledgerAccountGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAccount**](../Model/ResponseWrapperAccount.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerAccountListDeleteByIds**
> ledgerAccountListDeleteByIds($ids)

Delete multiple accounts.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->ledgerAccountListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling LedgeraccountApi->ledgerAccountListDeleteByIds: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| ID of the elements |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerAccountListPostList**
> \Swagger\Client\Model\ListResponseAccount ledgerAccountListPostList($body)

Create several accounts.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Account()); // \Swagger\Client\Model\Account[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->ledgerAccountListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgeraccountApi->ledgerAccountListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Account[]**](../Model/Account.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseAccount**](../Model/ListResponseAccount.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerAccountListPutList**
> \Swagger\Client\Model\ListResponseAccount ledgerAccountListPutList($body)

Update multiple accounts.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Account()); // \Swagger\Client\Model\Account[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->ledgerAccountListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgeraccountApi->ledgerAccountListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Account[]**](../Model/Account.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseAccount**](../Model/ListResponseAccount.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerAccountPost**
> \Swagger\Client\Model\ResponseWrapperAccount ledgerAccountPost($body)

Create a new account.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Account(); // \Swagger\Client\Model\Account | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->ledgerAccountPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgeraccountApi->ledgerAccountPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Account**](../Model/Account.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAccount**](../Model/ResponseWrapperAccount.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerAccountPut**
> \Swagger\Client\Model\ResponseWrapperAccount ledgerAccountPut($id, $body)

Update account.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Account(); // \Swagger\Client\Model\Account | Partial object describing what should be updated

try {
    $result = $apiInstance->ledgerAccountPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgeraccountApi->ledgerAccountPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Account**](../Model/Account.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAccount**](../Model/ResponseWrapperAccount.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerAccountSearch**
> \Swagger\Client\Model\ListResponseAccount ledgerAccountSearch($id, $number, $is_bank_account, $is_inactive, $is_applicable_for_supplier_invoice, $ledger_type, $is_balance_account, $saft_code, $from, $count, $sorting, $fields)

Find accounts corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$number = "number_example"; // string | List of IDs
$is_bank_account = true; // bool | Equals
$is_inactive = true; // bool | Equals
$is_applicable_for_supplier_invoice = true; // bool | Equals
$ledger_type = "ledger_type_example"; // string | Ledger type
$is_balance_account = true; // bool | Balance account
$saft_code = "saft_code_example"; // string | SAF-T code
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerAccountSearch($id, $number, $is_bank_account, $is_inactive, $is_applicable_for_supplier_invoice, $ledger_type, $is_balance_account, $saft_code, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgeraccountApi->ledgerAccountSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **number** | **string**| List of IDs | [optional]
 **is_bank_account** | **bool**| Equals | [optional]
 **is_inactive** | **bool**| Equals | [optional]
 **is_applicable_for_supplier_invoice** | **bool**| Equals | [optional]
 **ledger_type** | **string**| Ledger type | [optional]
 **is_balance_account** | **bool**| Balance account | [optional]
 **saft_code** | **string**| SAF-T code | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseAccount**](../Model/ListResponseAccount.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

