# VatType

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**name** | **string** |  | [optional] 
**number** | **string** |  | [optional] 
**display_name** | **string** |  | [optional] 
**percentage** | **float** |  | [optional] 
**deduction_percentage** | **float** | Percentage of the VAT amount that is deducted. Always 100% for all predefined VAT types, but can be lower for custom types for relative VAT. | [optional] 
**parent_type** | [**\Swagger\Client\Model\VatType**](VatType.md) | Only used on custom VAT types for relative VAT, gives the link to the parent VAT type. For most purposes the custom VAT type will behave like the parent VAT type, but with different deduction. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


