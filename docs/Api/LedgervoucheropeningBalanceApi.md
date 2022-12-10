# Swagger\Client\LedgervoucheropeningBalanceApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**ledgerVoucherOpeningBalanceCorrectionVoucherCorrectionVoucher**](LedgervoucheropeningBalanceApi.md#ledgerVoucherOpeningBalanceCorrectionVoucherCorrectionVoucher) | **GET** /ledger/voucher/openingBalance/&gt;correctionVoucher | [BETA] Get the correction voucher for the opening balance.
[**ledgerVoucherOpeningBalanceDelete**](LedgervoucheropeningBalanceApi.md#ledgerVoucherOpeningBalanceDelete) | **DELETE** /ledger/voucher/openingBalance | [BETA] Delete the opening balance. The correction voucher will also be deleted
[**ledgerVoucherOpeningBalanceGet**](LedgervoucheropeningBalanceApi.md#ledgerVoucherOpeningBalanceGet) | **GET** /ledger/voucher/openingBalance | [BETA] Get the voucher for the opening balance.
[**ledgerVoucherOpeningBalancePost**](LedgervoucheropeningBalanceApi.md#ledgerVoucherOpeningBalancePost) | **POST** /ledger/voucher/openingBalance | [BETA] Add an opening balance on the given date.  All movements before this date will be &#39;zeroed out&#39; in a separate correction voucher. The opening balance must have the first day of a month as the date, and it&#39;s also recommended to have the first day of the year as the date. If the postings provided don&#39;t balance the voucher, the difference will automatically be posted to a help account


# **ledgerVoucherOpeningBalanceCorrectionVoucherCorrectionVoucher**
> \Swagger\Client\Model\ResponseWrapperVoucher ledgerVoucherOpeningBalanceCorrectionVoucherCorrectionVoucher($fields)

[BETA] Get the correction voucher for the opening balance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucheropeningBalanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerVoucherOpeningBalanceCorrectionVoucherCorrectionVoucher($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucheropeningBalanceApi->ledgerVoucherOpeningBalanceCorrectionVoucherCorrectionVoucher: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherOpeningBalanceDelete**
> ledgerVoucherOpeningBalanceDelete()

[BETA] Delete the opening balance. The correction voucher will also be deleted



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucheropeningBalanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->ledgerVoucherOpeningBalanceDelete();
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucheropeningBalanceApi->ledgerVoucherOpeningBalanceDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherOpeningBalanceGet**
> \Swagger\Client\Model\ResponseWrapperVoucher ledgerVoucherOpeningBalanceGet($fields)

[BETA] Get the voucher for the opening balance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucheropeningBalanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerVoucherOpeningBalanceGet($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucheropeningBalanceApi->ledgerVoucherOpeningBalanceGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherOpeningBalancePost**
> \Swagger\Client\Model\ResponseWrapperVoucher ledgerVoucherOpeningBalancePost($body, $fields)

[BETA] Add an opening balance on the given date.  All movements before this date will be 'zeroed out' in a separate correction voucher. The opening balance must have the first day of a month as the date, and it's also recommended to have the first day of the year as the date. If the postings provided don't balance the voucher, the difference will automatically be posted to a help account



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucheropeningBalanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\OpeningBalance(); // \Swagger\Client\Model\OpeningBalance | dto
$fields = "*"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerVoucherOpeningBalancePost($body, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucheropeningBalanceApi->ledgerVoucherOpeningBalancePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\OpeningBalance**](../Model/OpeningBalance.md)| dto | [optional]
 **fields** | **string**| Fields filter pattern | [optional] [default to *]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

