# Swagger\Client\SupplierInvoiceApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**supplierInvoiceAddPaymentAddPayment**](SupplierInvoiceApi.md#supplierInvoiceAddPaymentAddPayment) | **POST** /supplierInvoice/{invoiceId}/:addPayment | Register payment, paymentType &#x3D;&#x3D; 0 finds the last paymentType for this vendor
[**supplierInvoiceAddRecipientAddRecipient**](SupplierInvoiceApi.md#supplierInvoiceAddRecipientAddRecipient) | **PUT** /supplierInvoice/{invoiceId}/:addRecipient | Add recipient to supplier invoices.
[**supplierInvoiceAddRecipientAddRecipientToMany**](SupplierInvoiceApi.md#supplierInvoiceAddRecipientAddRecipientToMany) | **PUT** /supplierInvoice/:addRecipient | Add recipient.
[**supplierInvoiceApproveApprove**](SupplierInvoiceApi.md#supplierInvoiceApproveApprove) | **PUT** /supplierInvoice/{invoiceId}/:approve | Approve supplier invoice.
[**supplierInvoiceApproveApproveMany**](SupplierInvoiceApi.md#supplierInvoiceApproveApproveMany) | **PUT** /supplierInvoice/:approve | Approve supplier invoices.
[**supplierInvoiceChangeDimensionChangeDimensionMany**](SupplierInvoiceApi.md#supplierInvoiceChangeDimensionChangeDimensionMany) | **PUT** /supplierInvoice/{invoiceId}/:changeDimension | Change dimension on a supplier invoice.
[**supplierInvoiceForApprovalGetApprovalInvoices**](SupplierInvoiceApi.md#supplierInvoiceForApprovalGetApprovalInvoices) | **GET** /supplierInvoice/forApproval | Get supplierInvoices for approval
[**supplierInvoiceGet**](SupplierInvoiceApi.md#supplierInvoiceGet) | **GET** /supplierInvoice/{id} | Get supplierInvoice by ID.
[**supplierInvoicePdfDownloadPdf**](SupplierInvoiceApi.md#supplierInvoicePdfDownloadPdf) | **GET** /supplierInvoice/{invoiceId}/pdf | Get supplierInvoice document by invoice ID.
[**supplierInvoiceRejectReject**](SupplierInvoiceApi.md#supplierInvoiceRejectReject) | **PUT** /supplierInvoice/{invoiceId}/:reject | reject supplier invoice.
[**supplierInvoiceRejectRejectMany**](SupplierInvoiceApi.md#supplierInvoiceRejectRejectMany) | **PUT** /supplierInvoice/:reject | reject supplier invoices.
[**supplierInvoiceSearch**](SupplierInvoiceApi.md#supplierInvoiceSearch) | **GET** /supplierInvoice | Find supplierInvoices corresponding with sent data.
[**supplierInvoiceVoucherPostingsPutPostings**](SupplierInvoiceApi.md#supplierInvoiceVoucherPostingsPutPostings) | **PUT** /supplierInvoice/voucher/{id}/postings | [BETA] Put debit postings.


# **supplierInvoiceAddPaymentAddPayment**
> \Swagger\Client\Model\ResponseWrapperSupplierInvoice supplierInvoiceAddPaymentAddPayment($invoice_id, $payment_type, $amount, $kid_or_receiver_reference, $bban, $payment_date, $use_default_payment_type, $partial_payment)

Register payment, paymentType == 0 finds the last paymentType for this vendor



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoice_id = 56; // int | Invoice ID.
$payment_type = 56; // int | 
$amount = "amount_example"; // string | 
$kid_or_receiver_reference = "kid_or_receiver_reference_example"; // string | 
$bban = "bban_example"; // string | 
$payment_date = "payment_date_example"; // string | 
$use_default_payment_type = false; // bool | Set paymentType to last type for vendor, autopay, nets or first available other type
$partial_payment = false; // bool | Set to true to allow multiple payments registered.

try {
    $result = $apiInstance->supplierInvoiceAddPaymentAddPayment($invoice_id, $payment_type, $amount, $kid_or_receiver_reference, $bban, $payment_date, $use_default_payment_type, $partial_payment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceAddPaymentAddPayment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invoice_id** | **int**| Invoice ID. |
 **payment_type** | **int**|  |
 **amount** | **string**|  | [optional]
 **kid_or_receiver_reference** | **string**|  | [optional]
 **bban** | **string**|  | [optional]
 **payment_date** | **string**|  | [optional]
 **use_default_payment_type** | **bool**| Set paymentType to last type for vendor, autopay, nets or first available other type | [optional] [default to false]
 **partial_payment** | **bool**| Set to true to allow multiple payments registered. | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierInvoice**](../Model/ResponseWrapperSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceAddRecipientAddRecipient**
> \Swagger\Client\Model\ResponseWrapperSupplierInvoice supplierInvoiceAddRecipientAddRecipient($invoice_id, $employee_id, $comment)

Add recipient to supplier invoices.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoice_id = 56; // int | Invoice ID.
$employee_id = 56; // int | ID of the elements
$comment = "comment_example"; // string | comment

try {
    $result = $apiInstance->supplierInvoiceAddRecipientAddRecipient($invoice_id, $employee_id, $comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceAddRecipientAddRecipient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invoice_id** | **int**| Invoice ID. |
 **employee_id** | **int**| ID of the elements |
 **comment** | **string**| comment | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierInvoice**](../Model/ResponseWrapperSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceAddRecipientAddRecipientToMany**
> \Swagger\Client\Model\ListResponseSupplierInvoice supplierInvoiceAddRecipientAddRecipientToMany($employee_id, $invoice_ids, $comment)

Add recipient.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Element ID
$invoice_ids = "invoice_ids_example"; // string | ID of the elements
$comment = "comment_example"; // string | comment

try {
    $result = $apiInstance->supplierInvoiceAddRecipientAddRecipientToMany($employee_id, $invoice_ids, $comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceAddRecipientAddRecipientToMany: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| Element ID |
 **invoice_ids** | **string**| ID of the elements | [optional]
 **comment** | **string**| comment | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplierInvoice**](../Model/ListResponseSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceApproveApprove**
> \Swagger\Client\Model\ResponseWrapperSupplierInvoice supplierInvoiceApproveApprove($invoice_id, $comment)

Approve supplier invoice.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoice_id = 56; // int | ID of the elements
$comment = "comment_example"; // string | comment

try {
    $result = $apiInstance->supplierInvoiceApproveApprove($invoice_id, $comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceApproveApprove: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invoice_id** | **int**| ID of the elements |
 **comment** | **string**| comment | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierInvoice**](../Model/ResponseWrapperSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceApproveApproveMany**
> \Swagger\Client\Model\ListResponseSupplierInvoice supplierInvoiceApproveApproveMany($invoice_ids, $comment)

Approve supplier invoices.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoice_ids = "invoice_ids_example"; // string | ID of the elements
$comment = "comment_example"; // string | comment

try {
    $result = $apiInstance->supplierInvoiceApproveApproveMany($invoice_ids, $comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceApproveApproveMany: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invoice_ids** | **string**| ID of the elements | [optional]
 **comment** | **string**| comment | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplierInvoice**](../Model/ListResponseSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceChangeDimensionChangeDimensionMany**
> \Swagger\Client\Model\ResponseWrapperSupplierInvoice supplierInvoiceChangeDimensionChangeDimensionMany($invoice_id, $dimension, $dimension_id, $debit_posting_ids)

Change dimension on a supplier invoice.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoice_id = 56; // int | Invoice ID.
$dimension = "dimension_example"; // string | Dimension
$dimension_id = 56; // int | DimensionID
$debit_posting_ids = "debit_posting_ids_example"; // string | ID of the elements

try {
    $result = $apiInstance->supplierInvoiceChangeDimensionChangeDimensionMany($invoice_id, $dimension, $dimension_id, $debit_posting_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceChangeDimensionChangeDimensionMany: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invoice_id** | **int**| Invoice ID. |
 **dimension** | **string**| Dimension |
 **dimension_id** | **int**| DimensionID |
 **debit_posting_ids** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierInvoice**](../Model/ResponseWrapperSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceForApprovalGetApprovalInvoices**
> \Swagger\Client\Model\ListResponseSupplierInvoice supplierInvoiceForApprovalGetApprovalInvoices($search_text, $show_all, $employee_id, $from, $count, $sorting, $fields)

Get supplierInvoices for approval



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$search_text = "search_text_example"; // string | Search for department, employee, project and more
$show_all = false; // bool | Show all or just your own
$employee_id = 56; // int | Default is logged in employee
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->supplierInvoiceForApprovalGetApprovalInvoices($search_text, $show_all, $employee_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceForApprovalGetApprovalInvoices: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **search_text** | **string**| Search for department, employee, project and more | [optional]
 **show_all** | **bool**| Show all or just your own | [optional] [default to false]
 **employee_id** | **int**| Default is logged in employee | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplierInvoice**](../Model/ListResponseSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceGet**
> \Swagger\Client\Model\ResponseWrapperSupplierInvoice supplierInvoiceGet($id, $fields)

Get supplierInvoice by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->supplierInvoiceGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierInvoice**](../Model/ResponseWrapperSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoicePdfDownloadPdf**
> string supplierInvoicePdfDownloadPdf($invoice_id)

Get supplierInvoice document by invoice ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoice_id = 56; // int | Invoice ID from which document is downloaded.

try {
    $result = $apiInstance->supplierInvoicePdfDownloadPdf($invoice_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoicePdfDownloadPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invoice_id** | **int**| Invoice ID from which document is downloaded. |

### Return type

**string**

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceRejectReject**
> \Swagger\Client\Model\ResponseWrapperSupplierInvoice supplierInvoiceRejectReject($invoice_id, $comment)

reject supplier invoice.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoice_id = 56; // int | Invoice ID.
$comment = "comment_example"; // string | 

try {
    $result = $apiInstance->supplierInvoiceRejectReject($invoice_id, $comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceRejectReject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invoice_id** | **int**| Invoice ID. |
 **comment** | **string**|  |

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierInvoice**](../Model/ResponseWrapperSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceRejectRejectMany**
> \Swagger\Client\Model\ListResponseSupplierInvoice supplierInvoiceRejectRejectMany($comment, $invoice_ids)

reject supplier invoices.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$comment = "comment_example"; // string | 
$invoice_ids = "invoice_ids_example"; // string | ID of the elements

try {
    $result = $apiInstance->supplierInvoiceRejectRejectMany($comment, $invoice_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceRejectRejectMany: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **comment** | **string**|  |
 **invoice_ids** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplierInvoice**](../Model/ListResponseSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceSearch**
> \Swagger\Client\Model\ListResponseSupplierInvoice supplierInvoiceSearch($invoice_date_from, $invoice_date_to, $id, $invoice_number, $kid, $voucher_id, $supplier_id, $from, $count, $sorting, $fields)

Find supplierInvoices corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$invoice_date_from = "invoice_date_from_example"; // string | From and including
$invoice_date_to = "invoice_date_to_example"; // string | To and excluding
$id = "id_example"; // string | List of IDs
$invoice_number = "invoice_number_example"; // string | Equals
$kid = "kid_example"; // string | Equals
$voucher_id = "voucher_id_example"; // string | Equals
$supplier_id = "supplier_id_example"; // string | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->supplierInvoiceSearch($invoice_date_from, $invoice_date_to, $id, $invoice_number, $kid, $voucher_id, $supplier_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **invoice_date_from** | **string**| From and including |
 **invoice_date_to** | **string**| To and excluding |
 **id** | **string**| List of IDs | [optional]
 **invoice_number** | **string**| Equals | [optional]
 **kid** | **string**| Equals | [optional]
 **voucher_id** | **string**| Equals | [optional]
 **supplier_id** | **string**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplierInvoice**](../Model/ListResponseSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierInvoiceVoucherPostingsPutPostings**
> \Swagger\Client\Model\ResponseWrapperSupplierInvoice supplierInvoiceVoucherPostingsPutPostings($id, $body, $send_to_ledger, $voucher_date)

[BETA] Put debit postings.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SupplierInvoiceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Voucher id
$body = array(new \Swagger\Client\Model\OrderLinePostingDTO()); // \Swagger\Client\Model\OrderLinePostingDTO[] | Postings
$send_to_ledger = false; // bool | Equals
$voucher_date = "voucher_date_example"; // string | If set, the date of the voucher and the supplier invoice will be changed to this date. If empty, date will not be changed

try {
    $result = $apiInstance->supplierInvoiceVoucherPostingsPutPostings($id, $body, $send_to_ledger, $voucher_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupplierInvoiceApi->supplierInvoiceVoucherPostingsPutPostings: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Voucher id |
 **body** | [**\Swagger\Client\Model\OrderLinePostingDTO[]**](../Model/OrderLinePostingDTO.md)| Postings | [optional]
 **send_to_ledger** | **bool**| Equals | [optional] [default to false]
 **voucher_date** | **string**| If set, the date of the voucher and the supplier invoice will be changed to this date. If empty, date will not be changed | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierInvoice**](../Model/ResponseWrapperSupplierInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

