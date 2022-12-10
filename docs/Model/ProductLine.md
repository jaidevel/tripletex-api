# ProductLine

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**stocktaking** | [**\Swagger\Client\Model\Stocktaking**](Stocktaking.md) |  | 
**product** | [**\Swagger\Client\Model\Product**](Product.md) |  | 
**count** | **float** |  | [optional] 
**unit_cost_currency** | **float** | Unit price purchase (cost) excluding VAT in the order&#39;s currency | [optional] 
**cost_currency** | **float** |  | [optional] 
**comment** | **string** |  | [optional] 
**counted** | **bool** | If a line is counted or not - only for internal use; will return true/false based on whether the stocktaking is completed otherwise. | [optional] 
**counter** | [**\Swagger\Client\Model\Employee**](Employee.md) | Who counted the line - only for internal use | [optional] 
**date_counted** | [**\DateTime**](\DateTime.md) | When the line was counted - only for internal use | [optional] 
**expected_stock** | **float** | For internal use only | [optional] 
**location** | [**\Swagger\Client\Model\InventoryLocation**](InventoryLocation.md) | Warehouse location | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


