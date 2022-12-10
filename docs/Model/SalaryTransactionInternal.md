# SalaryTransactionInternal

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**date** | **string** | Voucher date. | [optional] 
**year** | **int** |  | 
**month** | **int** |  | 
**period_as_string** | **string** |  | [optional] 
**is_historical** | **bool** | With historical wage vouchers you can update the wage system with information dated before the opening balance. | [optional] 
**payroll_tax_calc_method** | **string** | Employee National Insurance calculation method | [optional] 
**voucher_comment** | **string** | Comment on voucher | [optional] 
**payslip_general_comment** | **string** | Comment to be shown on all payslips | [optional] 
**completed** | **bool** |  | [optional] 
**pay_slips_available_date** | **string** | The date payslips are made available to the employee. Defaults to voucherDate. | [optional] 
**is_filtered_on_regular_salary** | **bool** |  | [optional] 
**is_filtered_on_open_posts** | **bool** |  | [optional] 
**is_filtered_on_travel_expenses** | **bool** |  | [optional] 
**is_filtered_on_expenses** | **bool** |  | [optional] 
**is_nets_module_remit** | **bool** |  | [optional] 
**is_autopay_module_remit** | **bool** |  | [optional] 
**payment_date** | **string** | The date payslips are paid | [optional] 
**not_deletable_message** | **string** |  | [optional] 
**has_bank_transfers** | **bool** |  | [optional] 
**payslips** | [**\Swagger\Client\Model\PayslipInternal[]**](PayslipInternal.md) | Link to individual payslip objects. | 
**voucher** | [**\Swagger\Client\Model\SalaryVoucherInternal**](SalaryVoucherInternal.md) | Link to the voucher object | [optional] 
**allow_delete_payments** | **bool** | Link to the voucher object | [optional] 
**payroll_tax_basis_amount** | **float** |  | [optional] 
**any_external_changes_on_this_transaction** | **bool** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


