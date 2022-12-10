# Swagger\Client\DocumentArchiveApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**documentArchiveAccountAccountPost**](DocumentArchiveApi.md#documentArchiveAccountAccountPost) | **POST** /documentArchive/account/{id} | [BETA] Upload file to Account Document Archive.
[**documentArchiveAccountGetAccount**](DocumentArchiveApi.md#documentArchiveAccountGetAccount) | **GET** /documentArchive/account/{id} | [BETA] Find documents archived associated with account object type.
[**documentArchiveCustomerCustomerPost**](DocumentArchiveApi.md#documentArchiveCustomerCustomerPost) | **POST** /documentArchive/customer/{id} | [BETA] Upload file to Customer Document Archive.
[**documentArchiveCustomerGetCustomer**](DocumentArchiveApi.md#documentArchiveCustomerGetCustomer) | **GET** /documentArchive/customer/{id} | [BETA] Find documents archived associated with customer object type.
[**documentArchiveDelete**](DocumentArchiveApi.md#documentArchiveDelete) | **DELETE** /documentArchive/{id} | [BETA] Delete document archive.
[**documentArchiveEmployeeEmployeePost**](DocumentArchiveApi.md#documentArchiveEmployeeEmployeePost) | **POST** /documentArchive/employee/{id} | [BETA] Upload file to Employee Document Archive.
[**documentArchiveEmployeeGetEmployee**](DocumentArchiveApi.md#documentArchiveEmployeeGetEmployee) | **GET** /documentArchive/employee/{id} | [BETA] Find documents archived associated with employee object type.
[**documentArchiveProductGetProduct**](DocumentArchiveApi.md#documentArchiveProductGetProduct) | **GET** /documentArchive/product/{id} | [BETA] Find documents archived associated with product object type.
[**documentArchiveProductProductPost**](DocumentArchiveApi.md#documentArchiveProductProductPost) | **POST** /documentArchive/product/{id} | [BETA] Upload file to Product Document Archive.
[**documentArchiveProjectGetProject**](DocumentArchiveApi.md#documentArchiveProjectGetProject) | **GET** /documentArchive/project/{id} | [BETA] Find documents archived associated with project object type.
[**documentArchiveProjectProjectPost**](DocumentArchiveApi.md#documentArchiveProjectProjectPost) | **POST** /documentArchive/project/{id} | [BETA] Upload file to Project Document Archive.
[**documentArchiveProspectGetProspect**](DocumentArchiveApi.md#documentArchiveProspectGetProspect) | **GET** /documentArchive/prospect/{id} | [BETA] Find documents archived associated with prospect object type.
[**documentArchiveProspectProspectPost**](DocumentArchiveApi.md#documentArchiveProspectProspectPost) | **POST** /documentArchive/prospect/{id} | [BETA] Upload file to Prospect Document Archive.
[**documentArchivePut**](DocumentArchiveApi.md#documentArchivePut) | **PUT** /documentArchive/{id} | [BETA] Update document archive.
[**documentArchiveReceptionReceptionPost**](DocumentArchiveApi.md#documentArchiveReceptionReceptionPost) | **POST** /documentArchive/reception | [BETA] Upload a file to the document archive reception. Send as multipart form.
[**documentArchiveSupplierGetSupplier**](DocumentArchiveApi.md#documentArchiveSupplierGetSupplier) | **GET** /documentArchive/supplier/{id} | [BETA] Find documents archived associated with supplier object type.
[**documentArchiveSupplierSupplierPost**](DocumentArchiveApi.md#documentArchiveSupplierSupplierPost) | **POST** /documentArchive/supplier/{id} | [BETA] Upload file to Supplier Document Archive.


# **documentArchiveAccountAccountPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive documentArchiveAccountAccountPost($file, $id)

[BETA] Upload file to Account Document Archive.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | The file
$id = 56; // int | Element ID

try {
    $result = $apiInstance->documentArchiveAccountAccountPost($file, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveAccountAccountPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **\SplFileObject**| The file |
 **id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveAccountGetAccount**
> \Swagger\Client\Model\ListResponseDocumentArchive documentArchiveAccountGetAccount($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with account object type.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->documentArchiveAccountGetAccount($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveAccountGetAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveCustomerCustomerPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive documentArchiveCustomerCustomerPost($file, $id)

[BETA] Upload file to Customer Document Archive.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | The file
$id = 56; // int | Element ID

try {
    $result = $apiInstance->documentArchiveCustomerCustomerPost($file, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveCustomerCustomerPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **\SplFileObject**| The file |
 **id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveCustomerGetCustomer**
> \Swagger\Client\Model\ListResponseDocumentArchive documentArchiveCustomerGetCustomer($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with customer object type.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->documentArchiveCustomerGetCustomer($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveCustomerGetCustomer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveDelete**
> documentArchiveDelete($id)

[BETA] Delete document archive.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->documentArchiveDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveDelete: ', $e->getMessage(), PHP_EOL;
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

# **documentArchiveEmployeeEmployeePost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive documentArchiveEmployeeEmployeePost($file, $id)

[BETA] Upload file to Employee Document Archive.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | The file
$id = 56; // int | Element ID

try {
    $result = $apiInstance->documentArchiveEmployeeEmployeePost($file, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveEmployeeEmployeePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **\SplFileObject**| The file |
 **id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveEmployeeGetEmployee**
> \Swagger\Client\Model\ListResponseDocumentArchive documentArchiveEmployeeGetEmployee($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with employee object type.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->documentArchiveEmployeeGetEmployee($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveEmployeeGetEmployee: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveProductGetProduct**
> \Swagger\Client\Model\ListResponseDocumentArchive documentArchiveProductGetProduct($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with product object type.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->documentArchiveProductGetProduct($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveProductGetProduct: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveProductProductPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive documentArchiveProductProductPost($file, $id)

[BETA] Upload file to Product Document Archive.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | The file
$id = 56; // int | Element ID

try {
    $result = $apiInstance->documentArchiveProductProductPost($file, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveProductProductPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **\SplFileObject**| The file |
 **id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveProjectGetProject**
> \Swagger\Client\Model\ListResponseDocumentArchive documentArchiveProjectGetProject($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with project object type.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->documentArchiveProjectGetProject($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveProjectGetProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveProjectProjectPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive documentArchiveProjectProjectPost($file, $id)

[BETA] Upload file to Project Document Archive.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | The file
$id = 56; // int | Element ID

try {
    $result = $apiInstance->documentArchiveProjectProjectPost($file, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveProjectProjectPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **\SplFileObject**| The file |
 **id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveProspectGetProspect**
> \Swagger\Client\Model\ListResponseDocumentArchive documentArchiveProspectGetProspect($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with prospect object type.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->documentArchiveProspectGetProspect($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveProspectGetProspect: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveProspectProspectPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive documentArchiveProspectProspectPost($file, $id)

[BETA] Upload file to Prospect Document Archive.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | The file
$id = 56; // int | Element ID

try {
    $result = $apiInstance->documentArchiveProspectProspectPost($file, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveProspectProspectPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **\SplFileObject**| The file |
 **id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchivePut**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive documentArchivePut($id, $body)

[BETA] Update document archive.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\DocumentArchive(); // \Swagger\Client\Model\DocumentArchive | Partial object describing what should be updated

try {
    $result = $apiInstance->documentArchivePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchivePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\DocumentArchive**](../Model/DocumentArchive.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveReceptionReceptionPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive documentArchiveReceptionReceptionPost($file)

[BETA] Upload a file to the document archive reception. Send as multipart form.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | The file

try {
    $result = $apiInstance->documentArchiveReceptionReceptionPost($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveReceptionReceptionPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **\SplFileObject**| The file |

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveSupplierGetSupplier**
> \Swagger\Client\Model\ListResponseDocumentArchive documentArchiveSupplierGetSupplier($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with supplier object type.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->documentArchiveSupplierGetSupplier($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveSupplierGetSupplier: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **documentArchiveSupplierSupplierPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive documentArchiveSupplierSupplierPost($file, $id)

[BETA] Upload file to Supplier Document Archive.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "/path/to/file.txt"; // \SplFileObject | The file
$id = 56; // int | Element ID

try {
    $result = $apiInstance->documentArchiveSupplierSupplierPost($file, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->documentArchiveSupplierSupplierPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **\SplFileObject**| The file |
 **id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

