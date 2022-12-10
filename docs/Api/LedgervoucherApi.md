# Swagger\Client\LedgervoucherApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**ledgerVoucherAttachmentDeleteAttachment**](LedgervoucherApi.md#ledgerVoucherAttachmentDeleteAttachment) | **DELETE** /ledger/voucher/{voucherId}/attachment | Delete attachment.
[**ledgerVoucherAttachmentUploadAttachment**](LedgervoucherApi.md#ledgerVoucherAttachmentUploadAttachment) | **POST** /ledger/voucher/{voucherId}/attachment | Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
[**ledgerVoucherDelete**](LedgervoucherApi.md#ledgerVoucherDelete) | **DELETE** /ledger/voucher/{id} | Delete voucher by ID.
[**ledgerVoucherExternalVoucherNumberExternalVoucherNumber**](LedgervoucherApi.md#ledgerVoucherExternalVoucherNumberExternalVoucherNumber) | **GET** /ledger/voucher/&gt;externalVoucherNumber | Find vouchers based on the external voucher number.
[**ledgerVoucherGet**](LedgervoucherApi.md#ledgerVoucherGet) | **GET** /ledger/voucher/{id} | Get voucher by ID.
[**ledgerVoucherImportDocumentImportDocument**](LedgervoucherApi.md#ledgerVoucherImportDocumentImportDocument) | **POST** /ledger/voucher/importDocument | Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
[**ledgerVoucherImportGbat10ImportGbat10**](LedgervoucherApi.md#ledgerVoucherImportGbat10ImportGbat10) | **POST** /ledger/voucher/importGbat10 | Import GBAT10. Send as multipart form.
[**ledgerVoucherListPutList**](LedgervoucherApi.md#ledgerVoucherListPutList) | **PUT** /ledger/voucher/list | Update multiple vouchers. Postings with guiRow&#x3D;&#x3D;0 will be deleted and regenerated.
[**ledgerVoucherNonPostedNonPosted**](LedgervoucherApi.md#ledgerVoucherNonPostedNonPosted) | **GET** /ledger/voucher/&gt;nonPosted | Find non-posted vouchers.
[**ledgerVoucherOptionsOptions**](LedgervoucherApi.md#ledgerVoucherOptionsOptions) | **GET** /ledger/voucher/{id}/options | Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
[**ledgerVoucherPdfDownloadPdf**](LedgervoucherApi.md#ledgerVoucherPdfDownloadPdf) | **GET** /ledger/voucher/{voucherId}/pdf | Get PDF representation of voucher by ID.
[**ledgerVoucherPdfUploadPdf**](LedgervoucherApi.md#ledgerVoucherPdfUploadPdf) | **POST** /ledger/voucher/{voucherId}/pdf/{fileName} | [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
[**ledgerVoucherPost**](LedgervoucherApi.md#ledgerVoucherPost) | **POST** /ledger/voucher | Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
[**ledgerVoucherPut**](LedgervoucherApi.md#ledgerVoucherPut) | **PUT** /ledger/voucher/{id} | Update voucher. Postings with guiRow&#x3D;&#x3D;0 will be deleted and regenerated.
[**ledgerVoucherReverseReverse**](LedgervoucherApi.md#ledgerVoucherReverseReverse) | **PUT** /ledger/voucher/{id}/:reverse | Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
[**ledgerVoucherSearch**](LedgervoucherApi.md#ledgerVoucherSearch) | **GET** /ledger/voucher | Find vouchers corresponding with sent data.
[**ledgerVoucherSendToInboxSendToInbox**](LedgervoucherApi.md#ledgerVoucherSendToInboxSendToInbox) | **PUT** /ledger/voucher/{id}/:sendToInbox | Send voucher to inbox.
[**ledgerVoucherSendToLedgerSendToLedger**](LedgervoucherApi.md#ledgerVoucherSendToLedgerSendToLedger) | **PUT** /ledger/voucher/{id}/:sendToLedger | Send voucher to ledger.
[**ledgerVoucherVoucherReceptionVoucherReception**](LedgervoucherApi.md#ledgerVoucherVoucherReceptionVoucherReception) | **GET** /ledger/voucher/&gt;voucherReception | Find vouchers in voucher reception.


# **ledgerVoucherAttachmentDeleteAttachment**
> ledgerVoucherAttachmentDeleteAttachment($voucher_id, $version, $send_to_inbox, $split)

Delete attachment.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$voucher_id = 56; // int | ID of voucher containing the attachment to delete.
$version = 56; // int | Version of voucher containing the attachment to delete.
$send_to_inbox = false; // bool | Should the attachment be sent to inbox rather than deleted?
$split = false; // bool | If sendToInbox is true, should the attachment be split into one voucher per page?

try {
    $apiInstance->ledgerVoucherAttachmentDeleteAttachment($voucher_id, $version, $send_to_inbox, $split);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherAttachmentDeleteAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **voucher_id** | **int**| ID of voucher containing the attachment to delete. |
 **version** | **int**| Version of voucher containing the attachment to delete. | [optional]
 **send_to_inbox** | **bool**| Should the attachment be sent to inbox rather than deleted? | [optional] [default to false]
 **split** | **bool**| If sendToInbox is true, should the attachment be split into one voucher per page? | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherAttachmentUploadAttachment**
> ledgerVoucherAttachmentUploadAttachment($voucher_id, $file)

Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$voucher_id = 56; // int | Voucher ID to upload attachment to.
$file = "/path/to/file.txt"; // \SplFileObject | The file

try {
    $apiInstance->ledgerVoucherAttachmentUploadAttachment($voucher_id, $file);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherAttachmentUploadAttachment: ', $e->getMessage(), PHP_EOL;
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

# **ledgerVoucherDelete**
> ledgerVoucherDelete($id)

Delete voucher by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->ledgerVoucherDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherDelete: ', $e->getMessage(), PHP_EOL;
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

# **ledgerVoucherExternalVoucherNumberExternalVoucherNumber**
> \Swagger\Client\Model\ListResponseVoucher ledgerVoucherExternalVoucherNumberExternalVoucherNumber($external_voucher_number, $from, $count, $sorting, $fields)

Find vouchers based on the external voucher number.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$external_voucher_number = "external_voucher_number_example"; // string | The external voucher number, when voucher is created from import.
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerVoucherExternalVoucherNumberExternalVoucherNumber($external_voucher_number, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherExternalVoucherNumberExternalVoucherNumber: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **external_voucher_number** | **string**| The external voucher number, when voucher is created from import. | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseVoucher**](../Model/ListResponseVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherGet**
> \Swagger\Client\Model\ResponseWrapperVoucher ledgerVoucherGet($id, $fields)

Get voucher by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerVoucherGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherImportDocumentImportDocument**
> \Swagger\Client\Model\ListResponseVoucher ledgerVoucherImportDocumentImportDocument($file, $description, $split)

Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | The file
$description = "description_example"; // string | Optional description to use for the voucher(s). If omitted the file name will be used.
$split = false; // bool | If the document consists of several pages, should the document be split into one voucher per page?

try {
    $result = $apiInstance->ledgerVoucherImportDocumentImportDocument($file, $description, $split);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherImportDocumentImportDocument: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **\SplFileObject**| The file |
 **description** | **string**| Optional description to use for the voucher(s). If omitted the file name will be used. | [optional]
 **split** | **bool**| If the document consists of several pages, should the document be split into one voucher per page? | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\ListResponseVoucher**](../Model/ListResponseVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherImportGbat10ImportGbat10**
> ledgerVoucherImportGbat10ImportGbat10($generate_vat_postings, $file, $encoding)

Import GBAT10. Send as multipart form.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$generate_vat_postings = true; // bool | If the import should generate VAT postings
$file = "/path/to/file.txt"; // \SplFileObject | The file
$encoding = "utf-8"; // string | The file encoding

try {
    $apiInstance->ledgerVoucherImportGbat10ImportGbat10($generate_vat_postings, $file, $encoding);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherImportGbat10ImportGbat10: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **generate_vat_postings** | **bool**| If the import should generate VAT postings |
 **file** | **\SplFileObject**| The file |
 **encoding** | **string**| The file encoding | [optional] [default to utf-8]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherListPutList**
> \Swagger\Client\Model\ListResponseVoucher ledgerVoucherListPutList($send_to_ledger, $body)

Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$send_to_ledger = true; // bool | Should the voucher be sent to ledger? Requires the \"Advanced Voucher\" permission.
$body = array(new \Swagger\Client\Model\Voucher()); // \Swagger\Client\Model\Voucher[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->ledgerVoucherListPutList($send_to_ledger, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **send_to_ledger** | **bool**| Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. | [optional] [default to true]
 **body** | [**\Swagger\Client\Model\Voucher[]**](../Model/Voucher.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseVoucher**](../Model/ListResponseVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherNonPostedNonPosted**
> \Swagger\Client\Model\ListResponseVoucher ledgerVoucherNonPostedNonPosted($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields)

Find non-posted vouchers.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$include_non_approved = false; // bool | Include non-approved vouchers in the result.
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$changed_since = "changed_since_example"; // string | Only return elements that have changed since this date and time
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerVoucherNonPostedNonPosted($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherNonPostedNonPosted: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **include_non_approved** | **bool**| Include non-approved vouchers in the result. | [default to false]
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **changed_since** | **string**| Only return elements that have changed since this date and time | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseVoucher**](../Model/ListResponseVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherOptionsOptions**
> \Swagger\Client\Model\ResponseWrapperVoucherOptions ledgerVoucherOptionsOptions($id, $fields)

Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerVoucherOptionsOptions($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherOptionsOptions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucherOptions**](../Model/ResponseWrapperVoucherOptions.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherPdfDownloadPdf**
> string ledgerVoucherPdfDownloadPdf($voucher_id)

Get PDF representation of voucher by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$voucher_id = 56; // int | Voucher ID from which PDF is downloaded.

try {
    $result = $apiInstance->ledgerVoucherPdfDownloadPdf($voucher_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherPdfDownloadPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **voucher_id** | **int**| Voucher ID from which PDF is downloaded. |

### Return type

**string**

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherPdfUploadPdf**
> ledgerVoucherPdfUploadPdf($voucher_id, $file_name, $file)

[DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$voucher_id = 56; // int | Voucher ID to upload PDF to.
$file_name = "file_name_example"; // string | File name to store the pdf under. Will not be the same as the filename on the file returned.
$file = "/path/to/file.txt"; // \SplFileObject | The file

try {
    $apiInstance->ledgerVoucherPdfUploadPdf($voucher_id, $file_name, $file);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherPdfUploadPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **voucher_id** | **int**| Voucher ID to upload PDF to. |
 **file_name** | **string**| File name to store the pdf under. Will not be the same as the filename on the file returned. |
 **file** | **\SplFileObject**| The file |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherPost**
> \Swagger\Client\Model\ResponseWrapperVoucher ledgerVoucherPost($send_to_ledger, $body)

Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$send_to_ledger = true; // bool | Should the voucher be sent to ledger? Requires the \"Advanced Voucher\" permission.
$body = new \Swagger\Client\Model\Voucher(); // \Swagger\Client\Model\Voucher | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->ledgerVoucherPost($send_to_ledger, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **send_to_ledger** | **bool**| Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. | [optional] [default to true]
 **body** | [**\Swagger\Client\Model\Voucher**](../Model/Voucher.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherPut**
> \Swagger\Client\Model\ResponseWrapperVoucher ledgerVoucherPut($id, $send_to_ledger, $body)

Update voucher. Postings with guiRow==0 will be deleted and regenerated.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$send_to_ledger = true; // bool | Should the voucher be sent to ledger? Requires the \"Advanced Voucher\" permission.
$body = new \Swagger\Client\Model\Voucher(); // \Swagger\Client\Model\Voucher | Partial object describing what should be updated

try {
    $result = $apiInstance->ledgerVoucherPut($id, $send_to_ledger, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **send_to_ledger** | **bool**| Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. | [optional] [default to true]
 **body** | [**\Swagger\Client\Model\Voucher**](../Model/Voucher.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherReverseReverse**
> \Swagger\Client\Model\ResponseWrapperVoucher ledgerVoucherReverseReverse($id, $date)

Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of voucher that should be reversed.
$date = "date_example"; // string | Reverse voucher date

try {
    $result = $apiInstance->ledgerVoucherReverseReverse($id, $date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherReverseReverse: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of voucher that should be reversed. |
 **date** | **string**| Reverse voucher date |

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherSearch**
> \Swagger\Client\Model\VoucherSearchResponse ledgerVoucherSearch($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields)

Find vouchers corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$id = "id_example"; // string | List of IDs
$number = "number_example"; // string | List of IDs
$number_from = 56; // int | From and including
$number_to = 56; // int | To and excluding
$type_id = "type_id_example"; // string | List of IDs
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerVoucherSearch($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| From and including |
 **date_to** | **string**| To and excluding |
 **id** | **string**| List of IDs | [optional]
 **number** | **string**| List of IDs | [optional]
 **number_from** | **int**| From and including | [optional]
 **number_to** | **int**| To and excluding | [optional]
 **type_id** | **string**| List of IDs | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\VoucherSearchResponse**](../Model/VoucherSearchResponse.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherSendToInboxSendToInbox**
> \Swagger\Client\Model\ResponseWrapperVoucher ledgerVoucherSendToInboxSendToInbox($id, $version, $comment)

Send voucher to inbox.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of voucher that should be sent to inbox.
$version = 56; // int | Version of voucher that should be sent to inbox.
$comment = "comment_example"; // string | Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled.

try {
    $result = $apiInstance->ledgerVoucherSendToInboxSendToInbox($id, $version, $comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherSendToInboxSendToInbox: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of voucher that should be sent to inbox. |
 **version** | **int**| Version of voucher that should be sent to inbox. | [optional]
 **comment** | **string**| Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherSendToLedgerSendToLedger**
> \Swagger\Client\Model\ResponseWrapperVoucher ledgerVoucherSendToLedgerSendToLedger($id, $version, $number)

Send voucher to ledger.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of voucher that should be sent to ledger.
$version = 56; // int | Version of voucher that should be sent to ledger.
$number = 0; // int | Voucher number to use. If omitted or 0 the system will assign the number.

try {
    $result = $apiInstance->ledgerVoucherSendToLedgerSendToLedger($id, $version, $number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherSendToLedgerSendToLedger: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of voucher that should be sent to ledger. |
 **version** | **int**| Version of voucher that should be sent to ledger. | [optional]
 **number** | **int**| Voucher number to use. If omitted or 0 the system will assign the number. | [optional] [default to 0]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerVoucherVoucherReceptionVoucherReception**
> \Swagger\Client\Model\ListResponseVoucher ledgerVoucherVoucherReceptionVoucherReception($date_from, $date_to, $search_text, $from, $count, $sorting, $fields)

Find vouchers in voucher reception.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$search_text = "search_text_example"; // string | Search
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerVoucherVoucherReceptionVoucherReception($date_from, $date_to, $search_text, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->ledgerVoucherVoucherReceptionVoucherReception: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **search_text** | **string**| Search | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseVoucher**](../Model/ListResponseVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

