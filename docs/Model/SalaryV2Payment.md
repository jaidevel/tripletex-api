# SalaryV2Payment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**transaction** | [**\Swagger\Client\Model\SalaryV2Transaction**](SalaryV2Transaction.md) |  | [optional] 
**employee** | [**\Swagger\Client\Model\SalaryEmployeeInternal**](SalaryEmployeeInternal.md) |  | 
**date** | **string** | Voucher date. | [optional] 
**year** | **int** |  | [optional] 
**month** | **int** |  | [optional] 
**vacation_allowance_amount** | **float** |  | [optional] 
**gross_amount** | **float** |  | [optional] 
**amount** | **float** |  | [optional] 
**number** | **int** |  | [optional] 
**sum_amount_tax_deductions** | **float** |  | [optional] 
**payroll_tax_amount** | **float** |  | [optional] 
**payroll_tax_basis** | **float** |  | [optional] 
**payroll_tax_municipality** | [**\Swagger\Client\Model\Municipality**](Municipality.md) |  | [optional] 
**division** | [**\Swagger\Client\Model\Company**](Company.md) |  | [optional] 
**holiday_allowance_rate** | **float** |  | [optional] 
**bank_account_or_iban** | **string** |  | [optional] 
**payroll_tax_percentage** | **float** |  | [optional] 
**delivery_method_pay_slip** | **string** |  | [optional] 
**is_tax_card_missing** | **bool** |  | [optional] 
**comment** | **string** |  | [optional] 
**specifications** | [**\Swagger\Client\Model\SalaryV2Specification[]**](SalaryV2Specification.md) | Link to salary specifications. | [optional] 
**travel_expenses** | [**\Swagger\Client\Model\SalaryV2TravelExpense[]**](SalaryV2TravelExpense.md) | Link to salary specifications. | [optional] 
**employee_hourly_wage** | **float** |  | [optional] 
**validation_results** | [**\Swagger\Client\Model\SalaryV2PaymentValidationResult**](SalaryV2PaymentValidationResult.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


