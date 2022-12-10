# Swagger\Client\BankstatementApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**bankStatementDelete**](BankstatementApi.md#bankStatementDelete) | **DELETE** /bank/statement/{id} | Delete bank statement by ID.
[**bankStatementGet**](BankstatementApi.md#bankStatementGet) | **GET** /bank/statement/{id} | Get bank statement.
[**bankStatementImportImportBankStatement**](BankstatementApi.md#bankStatementImportImportBankStatement) | **POST** /bank/statement/import | Upload bank statement file.
[**bankStatementSearch**](BankstatementApi.md#bankStatementSearch) | **GET** /bank/statement | Find bank statement corresponding with sent data.


# **bankStatementDelete**
> bankStatementDelete($id)

Delete bank statement by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankstatementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->bankStatementDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling BankstatementApi->bankStatementDelete: ', $e->getMessage(), PHP_EOL;
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

# **bankStatementGet**
> \Swagger\Client\Model\ResponseWrapperBankStatement bankStatementGet($id, $fields)

Get bank statement.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankstatementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankStatementGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankstatementApi->bankStatementGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankStatement**](../Model/ResponseWrapperBankStatement.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankStatementImportImportBankStatement**
> \Swagger\Client\Model\ResponseWrapperBankStatement bankStatementImportImportBankStatement($bank_id, $account_id, $from_date, $to_date, $file_format, $file, $external_id)

Upload bank statement file.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankstatementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bank_id = 56; // int | Bank ID
$account_id = 56; // int | Account ID
$from_date = "from_date_example"; // string | Format is yyyy-MM-dd (from and incl.).
$to_date = "to_date_example"; // string | Format is yyyy-MM-dd (to and excl.).
$file_format = "file_format_example"; // string | File format
$file = "/path/to/file.txt"; // \SplFileObject | The bank statement file
$external_id = "external_id_example"; // string | External ID

try {
    $result = $apiInstance->bankStatementImportImportBankStatement($bank_id, $account_id, $from_date, $to_date, $file_format, $file, $external_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankstatementApi->bankStatementImportImportBankStatement: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bank_id** | **int**| Bank ID |
 **account_id** | **int**| Account ID |
 **from_date** | **string**| Format is yyyy-MM-dd (from and incl.). |
 **to_date** | **string**| Format is yyyy-MM-dd (to and excl.). |
 **file_format** | **string**| File format |
 **file** | **\SplFileObject**| The bank statement file |
 **external_id** | **string**| External ID | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankStatement**](../Model/ResponseWrapperBankStatement.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankStatementSearch**
> \Swagger\Client\Model\ListResponseBankStatement bankStatementSearch($id, $account_id, $file_format, $from, $count, $sorting, $fields)

Find bank statement corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankstatementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$account_id = "account_id_example"; // string | List of IDs
$file_format = "file_format_example"; // string | File format
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankStatementSearch($id, $account_id, $file_format, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankstatementApi->bankStatementSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **account_id** | **string**| List of IDs | [optional]
 **file_format** | **string**| File format | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseBankStatement**](../Model/ListResponseBankStatement.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

