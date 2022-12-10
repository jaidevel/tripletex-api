# Swagger\Client\SaftApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**saftExportSAFTExportSAFT**](SaftApi.md#saftExportSAFTExportSAFT) | **GET** /saft/exportSAFT | [BETA] Create SAF-T export for the Tripletex account.
[**saftImportSAFTImportSAFT**](SaftApi.md#saftImportSAFTImportSAFT) | **POST** /saft/importSAFT | [BETA] Import SAF-T. Send XML file as multipart form.


# **saftExportSAFTExportSAFT**
> string saftExportSAFTExportSAFT($year)

[BETA] Create SAF-T export for the Tripletex account.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SaftApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$year = 56; // int | Year to export

try {
    $result = $apiInstance->saftExportSAFTExportSAFT($year);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SaftApi->saftExportSAFTExportSAFT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **year** | **int**| Year to export |

### Return type

**string**

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **saftImportSAFTImportSAFT**
> saftImportSAFTImportSAFT($saft_file, $mapping_file, $import_customer_vendors, $create_missing_accounts, $import_start_balance_from_opening, $import_start_balance_from_closing, $import_vouchers, $import_departments, $import_projects, $tripletex_generates_customer_numbers, $create_customer_ib, $update_account_names, $create_vendor_ib, $override_voucher_date_on_discrepancy, $overwrite_customers_contacts, $only_active_customers, $only_active_accounts, $update_start_balance)

[BETA] Import SAF-T. Send XML file as multipart form.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SaftApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$saft_file = "/path/to/file.txt"; // \SplFileObject | The SAF-T file (XML)
$mapping_file = "/path/to/file.txt"; // \SplFileObject | Mapping of chart of accounts (Excel). See https://tripletex.no/resources/examples/saft_account_mapping.xls
$import_customer_vendors = true; // bool | Create customers and suppliers
$create_missing_accounts = true; // bool | Create new accounts
$import_start_balance_from_opening = true; // bool | Create an opening balance from the import file's starting balance.
$import_start_balance_from_closing = true; // bool | Create an opening balance from the import file's outgoing balance.
$import_vouchers = true; // bool | Create vouchers
$import_departments = true; // bool | Create departments
$import_projects = true; // bool | Create projects
$tripletex_generates_customer_numbers = true; // bool | Let Tripletex create customer and supplier numbers and ignore the numbers in the import file.
$create_customer_ib = true; // bool | Create an opening balance on accounts receivable from customers
$update_account_names = true; // bool | Overwrite existing names on accounts
$create_vendor_ib = true; // bool | Create an opening balance on accounts payable
$override_voucher_date_on_discrepancy = true; // bool | Overwrite transaction date on period discrepancies.
$overwrite_customers_contacts = true; // bool | Overwrite existing customers/contacts
$only_active_customers = true; // bool | Only active customers
$only_active_accounts = true; // bool | Only active accounts
$update_start_balance = true; // bool | Update the opening balance of main ledger accounts from the import file by import before the opening balance.

try {
    $apiInstance->saftImportSAFTImportSAFT($saft_file, $mapping_file, $import_customer_vendors, $create_missing_accounts, $import_start_balance_from_opening, $import_start_balance_from_closing, $import_vouchers, $import_departments, $import_projects, $tripletex_generates_customer_numbers, $create_customer_ib, $update_account_names, $create_vendor_ib, $override_voucher_date_on_discrepancy, $overwrite_customers_contacts, $only_active_customers, $only_active_accounts, $update_start_balance);
} catch (Exception $e) {
    echo 'Exception when calling SaftApi->saftImportSAFTImportSAFT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **saft_file** | **\SplFileObject**| The SAF-T file (XML) |
 **mapping_file** | **\SplFileObject**| Mapping of chart of accounts (Excel). See https://tripletex.no/resources/examples/saft_account_mapping.xls |
 **import_customer_vendors** | **bool**| Create customers and suppliers |
 **create_missing_accounts** | **bool**| Create new accounts |
 **import_start_balance_from_opening** | **bool**| Create an opening balance from the import file&#39;s starting balance. |
 **import_start_balance_from_closing** | **bool**| Create an opening balance from the import file&#39;s outgoing balance. |
 **import_vouchers** | **bool**| Create vouchers |
 **import_departments** | **bool**| Create departments |
 **import_projects** | **bool**| Create projects |
 **tripletex_generates_customer_numbers** | **bool**| Let Tripletex create customer and supplier numbers and ignore the numbers in the import file. |
 **create_customer_ib** | **bool**| Create an opening balance on accounts receivable from customers |
 **update_account_names** | **bool**| Overwrite existing names on accounts |
 **create_vendor_ib** | **bool**| Create an opening balance on accounts payable |
 **override_voucher_date_on_discrepancy** | **bool**| Overwrite transaction date on period discrepancies. |
 **overwrite_customers_contacts** | **bool**| Overwrite existing customers/contacts |
 **only_active_customers** | **bool**| Only active customers |
 **only_active_accounts** | **bool**| Only active accounts |
 **update_start_balance** | **bool**| Update the opening balance of main ledger accounts from the import file by import before the opening balance. |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

