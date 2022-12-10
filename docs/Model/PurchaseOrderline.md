# PurchaseOrderline

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**purchase_order** | [**\Swagger\Client\Model\PurchaseOrder**](PurchaseOrder.md) | The purchase order to attach the orderline. | 
**product** | [**\Swagger\Client\Model\Product**](Product.md) |  | [optional] 
**resale_product** | [**\Swagger\Client\Model\Product**](Product.md) |  | [optional] 
**description** | **string** |  | [optional] 
**count** | **float** |  | [optional] 
**quantity_received** | **float** | Used if the Purchase Order has a Goods received. | [optional] 
**unit_cost_currency** | **float** | Unit price purchase (cost) excluding VAT in the order&#39;s currency | [optional] 
**unit_price_excluding_vat_currency** | **float** | Unit price of purchase excluding VAT in the order&#39;s currency.If it&#39;s not specified,it takes the value from purchase price in productDTO | [optional] 
**unit_list_price_currency** | **float** | Unit list price of purchase excluding VAT in the order&#39;s currency.If it&#39;s not specified,it takes the value from purchase price in productDTO | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) | The order line&#39;s currency. Determined by the order&#39;s currency. | [optional] 
**discount** | **float** | Discount given as a percentage (%) | [optional] 
**amount_excluding_vat_currency** | **float** | Total amount on order line excluding VAT in the order&#39;s currency | [optional] 
**amount_including_vat_currency** | **float** | Total amount on order line including VAT in the order&#39;s currency | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


