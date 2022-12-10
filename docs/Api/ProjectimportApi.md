# Swagger\Client\ProjectimportApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**projectImportImportProjectStatement**](ProjectimportApi.md#projectImportImportProjectStatement) | **POST** /project/import | Upload project import file.


# **projectImportImportProjectStatement**
> \Swagger\Client\Model\ListResponseProject projectImportImportProjectStatement($file_format, $file, $encoding, $delimiter, $ignore_first_row)

Upload project import file.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectimportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_format = "file_format_example"; // string | File format
$file = "/path/to/file.txt"; // \SplFileObject | The project import file
$encoding = "encoding_example"; // string | Encoding
$delimiter = "delimiter_example"; // string | Delimiter
$ignore_first_row = true; // bool | Ignore first row

try {
    $result = $apiInstance->projectImportImportProjectStatement($file_format, $file, $encoding, $delimiter, $ignore_first_row);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectimportApi->projectImportImportProjectStatement: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file_format** | **string**| File format |
 **file** | **\SplFileObject**| The project import file |
 **encoding** | **string**| Encoding | [optional]
 **delimiter** | **string**| Delimiter | [optional]
 **ignore_first_row** | **bool**| Ignore first row | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProject**](../Model/ListResponseProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

