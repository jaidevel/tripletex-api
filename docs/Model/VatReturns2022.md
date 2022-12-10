# VatReturns2022

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**start** | **string** |  | [optional] 
**closed_date** | **string** |  | [optional] 
**end** | **string** |  | [optional] 
**status** | **string** | The current instance status of the vatReturns. | [optional] 
**user_comment** | **string** |  | [optional] 
**structured_comment** | **string** |  | [optional] 
**vat_groups** | [**\Swagger\Client\Model\VatSpecificationGroup[]**](VatSpecificationGroup.md) |  | [optional] 
**voucher** | [**\Swagger\Client\Model\Voucher**](Voucher.md) |  | [optional] 
**altinn_metadata** | [**\Swagger\Client\Model\AltinnInstance**](AltinnInstance.md) | Metadata about the sending in altinn | [optional] 
**receipt_id** | **int** | Attachment for vat return | [optional] 
**total_amount_vat_to_pay** | [**\Swagger\Client\Model\TlxNumber**](TlxNumber.md) |  | [optional] 
**remaining_amount_vat_to_pay** | [**\Swagger\Client\Model\TlxNumber**](TlxNumber.md) |  | [optional] 
**is_paid** | **bool** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


