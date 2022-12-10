# OrderLine

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**product** | [**\Swagger\Client\Model\Product**](Product.md) |  | [optional] 
**inventory** | [**\Swagger\Client\Model\Inventory**](Inventory.md) |  | [optional] 
**inventory_location** | [**\Swagger\Client\Model\InventoryLocation**](InventoryLocation.md) | Inventory location field -- beta program | [optional] 
**description** | **string** |  | [optional] 
**count** | **float** |  | [optional] 
**unit_cost_currency** | **float** | Unit price purchase (cost) excluding VAT in the order&#39;s currency | [optional] 
**unit_price_excluding_vat_currency** | **float** | Unit price of purchase excluding VAT in the order&#39;s currency | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) | The order line&#39;s currency. Determined by the order&#39;s currency. | [optional] 
**markup** | **float** | Markup given as a percentage (%) | [optional] 
**discount** | **float** | Discount given as a percentage (%) | [optional] 
**vat_type** | [**\Swagger\Client\Model\VatType**](VatType.md) |  | [optional] 
**amount_excluding_vat_currency** | **float** | Total amount on order line excluding VAT in the order&#39;s currency | [optional] 
**amount_including_vat_currency** | **float** | Total amount on order line including VAT in the order&#39;s currency | [optional] 
**order** | [**\Swagger\Client\Model\Order**](Order.md) | The related Order for this OrderLine. This field is required when creating a new OrderLine in the API. | [optional] 
**unit_price_including_vat_currency** | **float** | Unit price of purchase including VAT in the order&#39;s currency | [optional] 
**is_subscription** | **bool** |  | [optional] 
**subscription_period_start** | **string** |  | [optional] 
**subscription_period_end** | **string** |  | [optional] 
**order_group** | [**\Swagger\Client\Model\OrderGroup**](OrderGroup.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


