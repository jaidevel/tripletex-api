# Prospect

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**name** | **string** |  | [optional] 
**description** | **string** |  | [optional] 
**created_date** | **string** |  | 
**customer** | [**\Swagger\Client\Model\Customer**](Customer.md) |  | [optional] 
**sales_employee** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**is_closed** | **bool** |  | [optional] 
**closed_reason** | **int** |  | [optional] 
**closed_date** | **string** |  | [optional] 
**competitor** | **string** |  | [optional] 
**prospect_type** | **int** |  | [optional] 
**project** | [**\Swagger\Client\Model\Project**](Project.md) | The project connected to this prospect. | [optional] 
**project_offer** | [**\Swagger\Client\Model\Project**](Project.md) | The project offer connected to this prospect. | [optional] 
**final_income_date** | **string** | The estimated start date for income on the prospect. | [optional] 
**final_initial_value** | **float** | The estimated startup fee on this prospect. | [optional] 
**final_monthly_value** | **float** | The estimated monthly fee on this prospect. | [optional] 
**final_additional_services_value** | **float** | Tripletex specific. | [optional] 
**total_value** | **float** | The estimated total fee on this prospect. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


