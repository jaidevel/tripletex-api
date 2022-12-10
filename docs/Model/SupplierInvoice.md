# SupplierInvoice

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**invoice_number** | **string** | Invoice number | [optional] 
**invoice_date** | **string** |  | 
**supplier** | [**\Swagger\Client\Model\Supplier**](Supplier.md) | The invoice supplier | [optional] 
**invoice_due_date** | **string** |  | 
**kid_or_receiver_reference** | **string** | KID or message | [optional] 
**voucher** | [**\Swagger\Client\Model\Voucher**](Voucher.md) | The invoice voucher. | [optional] 
**amount** | **float** | In the company’s currency, typically NOK. Is 0 if value is missing. | [optional] 
**amount_currency** | **float** | In the specified currency. | [optional] 
**amount_excluding_vat** | **float** | Amount excluding VAT (NOK). Is 0 if value is missing. | [optional] 
**amount_excluding_vat_currency** | **float** | Amount excluding VAT in the specified currency. Is 0 if value is missing. | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) |  | [optional] 
**is_credit_note** | **bool** |  | [optional] 
**order_lines** | [**\Swagger\Client\Model\OrderLine[]**](OrderLine.md) |  | [optional] 
**payments** | [**\Swagger\Client\Model\Posting[]**](Posting.md) |  | [optional] 
**original_invoice_document_id** | **int** |  | [optional] 
**approval_list_elements** | [**\Swagger\Client\Model\VoucherApprovalListElement[]**](VoucherApprovalListElement.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


