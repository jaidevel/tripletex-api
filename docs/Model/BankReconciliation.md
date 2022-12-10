# BankReconciliation

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**account** | [**\Swagger\Client\Model\Account**](Account.md) |  | 
**accounting_period** | [**\Swagger\Client\Model\AccountingPeriod**](AccountingPeriod.md) |  | 
**voucher** | [**\Swagger\Client\Model\Voucher**](Voucher.md) |  | [optional] 
**transactions** | [**\Swagger\Client\Model\BankTransaction[]**](BankTransaction.md) | Bank transactions tied to the bank reconciliation | [optional] 
**is_closed** | **bool** |  | [optional] 
**type** | **string** | Type of Bank Reconciliation. | 
**bank_account_closing_balance_currency** | **float** |  | [optional] 
**closed_date** | **string** |  | [optional] 
**closed_by_contact** | [**\Swagger\Client\Model\Contact**](Contact.md) |  | [optional] 
**closed_by_employee** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**approvable** | **bool** |  | [optional] 
**auto_pay_reconciliation** | **bool** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


