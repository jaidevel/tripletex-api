# Supplier

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
**is_supplier** | **bool** |  | [optional] 
**is_customer** | **bool** | Determine if the supplier is also a customer | [optional] 
**is_inactive** | **bool** |  | [optional] 
**email** | **string** |  | [optional] 
**bank_accounts** | **string[]** | [DEPRECATED] List of the bank account numbers for this supplier.  Norwegian bank account numbers only. | [optional] 
**invoice_email** | **string** |  | [optional] 
**overdue_notice_email** | **string** | The email address of the customer where the noticing emails are sent in case of an overdue | [optional] 
**phone_number** | **string** |  | [optional] 
**phone_number_mobile** | **string** |  | [optional] 
**description** | **string** |  | [optional] 
**is_private_individual** | **bool** |  | [optional] 
**show_products** | **bool** |  | [optional] 
**account_manager** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**postal_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**physical_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**delivery_address** | [**\Swagger\Client\Model\DeliveryAddress**](DeliveryAddress.md) |  | [optional] 
**category1** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) | Category 1 of this supplier | [optional] 
**category2** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) | Category 2 of this supplier | [optional] 
**category3** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) | Category 3 of this supplier | [optional] 
**bank_account_presentation** | [**\Swagger\Client\Model\CompanyBankAccountPresentation[]**](CompanyBankAccountPresentation.md) | List of bankAccount for this supplier | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) | The preferred currency for this supplier | [optional] 
**ledger_account** | [**\Swagger\Client\Model\Account**](Account.md) | Can be used to specify the ledger account of the supplier if it&#39;s different from the default 2400 account | [optional] 
**is_wholesaler** | **bool** |  | [optional] 
**display_name** | **string** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


