# SupplierAutomation

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**vendor_id** | **int** |  | 
**name** | **string** |  | 
**number** | **string** |  | 
**automatically_posted_invoices_last10_count** | **int** | Number automatically of the latest 10 posted invoices | [optional] 
**automatically_posted_invoices_last10_count_automation** | **int** | Number automatically of the latest 10 posted invoices | [optional] 
**automatically_posted_invoices_last10_count_automation_rule** | **int** | Number automatically of the latest 10 posted invoices | [optional] 
**not_automatically_posted_invoices_last10_count** | **int** | Number of not automatically of the latest 10 posted invoices | [optional] 
**vendor_account_number** | **int** |  | 
**activated** | **bool** | Is automation activated? | [optional] 
**category** | **int** | Automation category. 0-3. | [optional] 
**automated_count** | **int** | Number of automated vouchers | [optional] 
**voucher_count_last90_days_ehf** | **int** | Number of EHF vouchers last 90 days. | [optional] 
**voucher_count_last90_days_non_ehf** | **int** | Number of non-EHF vouchers last 90 days. | [optional] 
**voucher_count** | **int** | Number of EHF vouchers send from this supplier regardless of time. | [optional] 
**completed_invoices** | **int** | Number of invoices with status completed based on the last 10 invoices. | [optional] 
**not_completed_invoices** | **int** | Number of invoices with status not completed based on the last 10 invoices. | [optional] 
**can_send_ehf** | **bool** | Whether the vendor can send EHF | 
**email** | **string** | email of the vendor | 
**automation_rules_details** | [**\Swagger\Client\Model\AutomationRuleDetails**](AutomationRuleDetails.md) | The vendor rule details of the vendor if he/she has chosen to have his own rules on the automation instead of FabricAi. | [optional] 
**payment_type_fabric_ai** | **int** | If set, the payment type to be used when automating an invoice from this vendor. | [optional] 
**amount_max_fabric_ai_vendor_invoice** | **int** | If set, gives the amount limit for automating invoices for this vendor, it the total invoice amount is above the limit, the invoice is not automated. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


