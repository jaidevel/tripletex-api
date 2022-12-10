# Customer

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**name** | **string** |  | 
**organization_number** | **string** |  | [optional] 
**supplier_number** | **int** |  | [optional] 
**customer_number** | **int** |  | [optional] 
**is_supplier** | **bool** | Defines if the customer is also a supplier. | [optional] 
**is_customer** | **bool** |  | [optional] 
**is_inactive** | **bool** |  | [optional] 
**account_manager** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**email** | **string** |  | [optional] 
**invoice_email** | **string** |  | [optional] 
**overdue_notice_email** | **string** | The email address of the customer where the noticing emails are sent in case of an overdue | [optional] 
**bank_accounts** | **string[]** | [DEPRECATED] List of the bank account numbers for this customer. Norwegian bank account numbers only. | [optional] 
**phone_number** | **string** |  | [optional] 
**phone_number_mobile** | **string** |  | [optional] 
**description** | **string** |  | [optional] 
**language** | **string** |  | [optional] 
**display_name** | **string** |  | [optional] 
**is_private_individual** | **bool** |  | [optional] 
**single_customer_invoice** | **bool** | Enables various orders on one customer invoice. | [optional] 
**invoice_send_method** | **string** | Define the invoicing method for the customer.&lt;br&gt;EMAIL: Send invoices as email.&lt;br&gt;EHF: Send invoices as EHF.&lt;br&gt;EFAKTURA: Send invoices as EFAKTURA.&lt;br&gt;AVTALEGIRO: Send invoices as AVTALEGIRO.&lt;br&gt;VIPPS: Send invoices through VIPPS.&lt;br&gt;PAPER: Send invoices as paper invoice.&lt;br&gt;MANUAL: User will have to send invocie manually.&lt;br&gt; | [optional] 
**email_attachment_type** | **string** | Define the invoice attachment type for emailing to the customer.&lt;br&gt;LINK: Send invoice as link in email.&lt;br&gt;ATTACHMENT: Send invoice as attachment in email.&lt;br&gt; | [optional] 
**postal_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**physical_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**delivery_address** | [**\Swagger\Client\Model\DeliveryAddress**](DeliveryAddress.md) |  | [optional] 
**category1** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) | Category 1 of this customer | [optional] 
**category2** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) | Category 2 of this customer | [optional] 
**category3** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) | Category 3 of this customer | [optional] 
**invoices_due_in** | **int** | Number of days/months in which invoices created from this customer is due | [optional] 
**invoices_due_in_type** | **string** | Set the time unit of invoicesDueIn. The special case RECURRING_DAY_OF_MONTH enables the due date to be fixed to a specific day of the month, in this case the fixed due date will automatically be set as standard on all invoices created from this customer. Note that when RECURRING_DAY_OF_MONTH is set, the due date will be set to the last day of month if \&quot;31\&quot; is set in invoicesDueIn. | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) | The preferred currency for this customer | [optional] 
**bank_account_presentation** | [**\Swagger\Client\Model\CompanyBankAccountPresentation[]**](CompanyBankAccountPresentation.md) | List of bankAccount for this customer | [optional] 
**ledger_account** | [**\Swagger\Client\Model\Account**](Account.md) | Can be used to specify the ledger account of the customer if it&#39;s different from the default 1500 account. | [optional] 
**is_factoring** | **bool** | If true; send this customers invoices to factoring (if factoring is turned on in account). | [optional] 
**invoice_send_sms_notification** | **bool** | Is sms-notification on/off | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


