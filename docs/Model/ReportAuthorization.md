# ReportAuthorization

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**granter** | [**\Swagger\Client\Model\Employee**](Employee.md) | The one granting permission | [optional] 
**granter_delegator_id** | **int** | If set specifies the delegator to the granter proxy employee. | [optional] 
**subject** | [**\Swagger\Client\Model\Employee**](Employee.md) | The one receiving permission | 
**subject_delegator_id** | **int** | If set specifies the delegator to the subject proxy employee. | [optional] 
**report** | [**\Swagger\Client\Model\Report**](Report.md) | The target resource to be granted permissions for | 
**status** | **string** | The status of this grant of authorization | 
**permission** | **string** | The specific permission this grant of authorization is for | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


