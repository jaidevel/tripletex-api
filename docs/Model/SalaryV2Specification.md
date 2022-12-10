# SalaryV2Specification

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**specification_type** | **string** | Type of specification; only TYPE_MANUAL are user create- and editable | [optional] 
**rate** | **float** |  | [optional] 
**count** | **float** |  | [optional] 
**project** | [**\Swagger\Client\Model\Project**](Project.md) |  | [optional] 
**department** | [**\Swagger\Client\Model\Department**](Department.md) |  | [optional] 
**salary_type** | [**\Swagger\Client\Model\SalaryTypeInternal**](SalaryTypeInternal.md) |  | [optional] 
**salary_payment** | [**\Swagger\Client\Model\SalaryV2Payment**](SalaryV2Payment.md) |  | [optional] 
**employee** | [**\Swagger\Client\Model\SalaryEmployeeInternal**](SalaryEmployeeInternal.md) |  | [optional] 
**travel_expense** | [**\Swagger\Client\Model\SalaryTravelExpense**](SalaryTravelExpense.md) |  | [optional] 
**description** | **string** |  | [optional] 
**date** | **string** | date | [optional] 
**year** | **int** |  | [optional] 
**month** | **int** |  | [optional] 
**amount** | **float** |  | [optional] 
**payment_amount** | **float** |  | [optional] 
**supplement** | [**\Swagger\Client\Model\SalaryV2Supplement**](SalaryV2Supplement.md) | Salary specification supplement. Required if the salaryType requires supplementary information. | [optional] 
**external_changes_since_last_time** | **bool** |  | [optional] 
**cost_carrier_editable** | **bool** |  | [optional] 
**count_and_rate_editable** | **bool** |  | [optional] 
**salary_type_editable** | **bool** |  | [optional] 
**template_increment** | **bool** |  | [optional] 
**ref_year** | **int** |  | [optional] 
**free_car_spec** | **bool** |  | [optional] 
**union_spec** | **bool** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


