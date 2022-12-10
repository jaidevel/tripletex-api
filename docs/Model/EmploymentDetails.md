# EmploymentDetails

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**employment** | [**\Swagger\Client\Model\Employment**](Employment.md) |  | [optional] 
**date** | **string** |  | [optional] 
**employment_type** | **string** | Define the employment type. | [optional] 
**employment_form** | **string** | Define the employment form. | [optional] 
**maritime_employment** | [**\Swagger\Client\Model\MaritimeEmployment**](MaritimeEmployment.md) |  | [optional] 
**remuneration_type** | **string** | Define the remuneration type. | [optional] 
**working_hours_scheme** | **string** | Define the working hours scheme type. If you enter a value for SHIFT WORK, you must also enter value for shiftDurationHours | [optional] 
**shift_duration_hours** | **float** |  | [optional] 
**occupation_code** | [**\Swagger\Client\Model\OccupationCode**](OccupationCode.md) | To find the right value to enter in this field, you could go to GET /employee/employment/occupationCode to get a list of valid ID&#39;s. | [optional] 
**percentage_of_full_time_equivalent** | **float** |  | 
**annual_salary** | **float** |  | [optional] 
**hourly_wage** | **float** |  | [optional] 
**payroll_tax_municipality_id** | [**\Swagger\Client\Model\Municipality**](Municipality.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


