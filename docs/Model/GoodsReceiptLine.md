# GoodsReceiptLine

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**purchase_order** | [**\Swagger\Client\Model\PurchaseOrder**](PurchaseOrder.md) |  | [optional] 
**product** | [**\Swagger\Client\Model\Product**](Product.md) |  | 
**resale_product** | [**\Swagger\Client\Model\Product**](Product.md) |  | [optional] 
**inventory** | [**\Swagger\Client\Model\Inventory**](Inventory.md) | If not entered, the default warehouse will be used | [optional] 
**inventory_location** | [**\Swagger\Client\Model\InventoryLocation**](InventoryLocation.md) | Inventory location field -- pilot program | [optional] 
**quantity_ordered** | **float** |  | [optional] 
**quantity_received** | **float** |  | 
**quantity_rest** | **float** |  | [optional] 
**deviation** | **float** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


