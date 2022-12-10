# Swagger\Client\ProductproductPriceApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**productProductPriceSearch**](ProductproductPriceApi.md#productProductPriceSearch) | **GET** /product/productPrice | [BETA] Find prices for a product. Only available for users that have activated the Logistics/Logistics Plus Beta-program in &#39;Our customer account&#39;.


# **productProductPriceSearch**
> \Swagger\Client\Model\ListResponseProductPrice productProductPriceSearch($product_id, $from_date, $to_date, $show_only_last_price, $from, $count, $sorting, $fields)

[BETA] Find prices for a product. Only available for users that have activated the Logistics/Logistics Plus Beta-program in 'Our customer account'.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductproductPriceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_id = "product_id_example"; // string | Equals
$from_date = "from_date_example"; // string | From and including
$to_date = "to_date_example"; // string | To and excluding
$show_only_last_price = true; // bool | If showOnlyLastPrice is true, fromDate and toDate are ignored and only last price of the product is send back.
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productProductPriceSearch($product_id, $from_date, $to_date, $show_only_last_price, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductproductPriceApi->productProductPriceSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **product_id** | **string**| Equals |
 **from_date** | **string**| From and including | [optional]
 **to_date** | **string**| To and excluding | [optional]
 **show_only_last_price** | **bool**| If showOnlyLastPrice is true, fromDate and toDate are ignored and only last price of the product is send back. | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductPrice**](../Model/ListResponseProductPrice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

