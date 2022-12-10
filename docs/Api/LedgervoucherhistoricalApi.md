# Swagger\Client\LedgervoucherhistoricalApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**ledgerVoucherHistoricalAttachmentUploadAttachment**](LedgervoucherhistoricalApi.md#ledgerVoucherHistoricalAttachmentUploadAttachment) | **POST** /ledger/voucher/historical/{voucherId}/attachment | Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
[**ledgerVoucherHistoricalClosePostingsClosePostings**](LedgervoucherhistoricalApi.md#ledgerVoucherHistoricalClosePostingsClosePostings) | **PUT** /ledger/voucher/historical/:closePostings | [BETA] Close postings.
[**ledgerVoucherHistoricalEmployeePostEmployee**](LedgervoucherhistoricalApi.md#ledgerVoucherHistoricalEmployeePostEmployee) | **POST** /ledger/voucher/historical/employee | [BETA] Create one employee, based on import from external system. Validation is less strict, ie. employee department isn&#39;t required.
[**ledgerVoucherHistoricalHistoricalPostHistorical**](LedgervoucherhistoricalApi.md#ledgerVoucherHistoricalHistoricalPostHistorical) | **POST** /ledger/voucher/historical/historical | API endpoint for creating historical vouchers. These are vouchers created outside Tripletex, and should be from closed accounting years. The intended usage is to get access to historical transcations in Tripletex. Also creates postings. All amount fields in postings will be used. VAT postings must be included, these are not generated automatically like they are for normal vouchers in Tripletex. Requires the \\\&quot;All vouchers\\\&quot; and \\\&quot;Advanced Voucher\\\&quot; permissions.
[**ledgerVoucherHistoricalReverseHistoricalVouchersReverseHistoricalVouchers**](LedgervoucherhistoricalApi.md#ledgerVoucherHistoricalReverseHistoricalVouchersReverseHistoricalVouchers) | **PUT** /ledger/voucher/historical/:reverseHistoricalVouchers | [BETA] Deletes all historical vouchers. Requires the \&quot;All vouchers\&quot; and \&quot;Advanced Voucher\&quot; permissions.


# **ledgerVoucherHistoricalAttachmentUploadAttachment**
> ledgerVoucherHistoricalAttachmentUploadAttachment($voucher_id, $file)

Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherhistoricalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$voucher_id = 56; // int | Voucher ID to upload attachment to.
$file = "/path/to/file.txt"; // \SplFileObject | The file

try {
    $apiInstance->ledgerVoucherHistoricalAttachmentUploadAttachment($voucher_id, $file);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherhistoricalApi->ledgerVoucherHistoricalAttachmentUploadAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **voucher_id** | **int**| Voucher ID to upload attachment to. |
 **file** | **\SplFileObject**| The file |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherHistoricalClosePostingsClosePostings**
> ledgerVoucherHistoricalClosePostingsClosePostings($posting_ids)

[BETA] Close postings.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherhistoricalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$posting_ids = "posting_ids_example"; // string | List of Posting IDs to close separated by comma.  The postings should have the same customer, supplier or employee. The sum of amount for all postings MUST be 0.0, otherwise an exception will be thrown.

try {
    $apiInstance->ledgerVoucherHistoricalClosePostingsClosePostings($posting_ids);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherhistoricalApi->ledgerVoucherHistoricalClosePostingsClosePostings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **posting_ids** | **string**| List of Posting IDs to close separated by comma.  The postings should have the same customer, supplier or employee. The sum of amount for all postings MUST be 0.0, otherwise an exception will be thrown. | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherHistoricalEmployeePostEmployee**
> \Swagger\Client\Model\ResponseWrapperEmployee ledgerVoucherHistoricalEmployeePostEmployee($body)

[BETA] Create one employee, based on import from external system. Validation is less strict, ie. employee department isn't required.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherhistoricalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Employee(); // \Swagger\Client\Model\Employee | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->ledgerVoucherHistoricalEmployeePostEmployee($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherhistoricalApi->ledgerVoucherHistoricalEmployeePostEmployee: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Employee**](../Model/Employee.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEmployee**](../Model/ResponseWrapperEmployee.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherHistoricalHistoricalPostHistorical**
> \Swagger\Client\Model\ListResponseHistoricalVoucher ledgerVoucherHistoricalHistoricalPostHistorical($body, $comment)

API endpoint for creating historical vouchers. These are vouchers created outside Tripletex, and should be from closed accounting years. The intended usage is to get access to historical transcations in Tripletex. Also creates postings. All amount fields in postings will be used. VAT postings must be included, these are not generated automatically like they are for normal vouchers in Tripletex. Requires the \\\"All vouchers\\\" and \\\"Advanced Voucher\\\" permissions.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherhistoricalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\HistoricalVoucher()); // \Swagger\Client\Model\HistoricalVoucher[] | List of vouchers and related postings to import. Max 500.
$comment = "comment_example"; // string | Import comment, include the name and version of the source system.

try {
    $result = $apiInstance->ledgerVoucherHistoricalHistoricalPostHistorical($body, $comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherhistoricalApi->ledgerVoucherHistoricalHistoricalPostHistorical: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\HistoricalVoucher[]**](../Model/HistoricalVoucher.md)| List of vouchers and related postings to import. Max 500. | [optional]
 **comment** | **string**| Import comment, include the name and version of the source system. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseHistoricalVoucher**](../Model/ListResponseHistoricalVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherHistoricalReverseHistoricalVouchersReverseHistoricalVouchers**
> ledgerVoucherHistoricalReverseHistoricalVouchersReverseHistoricalVouchers()

[BETA] Deletes all historical vouchers. Requires the \"All vouchers\" and \"Advanced Voucher\" permissions.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherhistoricalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->ledgerVoucherHistoricalReverseHistoricalVouchersReverseHistoricalVouchers();
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherhistoricalApi->ledgerVoucherHistoricalReverseHistoricalVouchersReverseHistoricalVouchers: ', $e->getMessage(), PHP_EOL;
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

