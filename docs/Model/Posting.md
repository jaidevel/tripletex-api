# Posting

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**voucher** | [**\Swagger\Client\Model\Voucher**](Voucher.md) |  | [optional] 
**date** | **string** |  | [optional] 
**description** | **string** |  | [optional] 
**account** | [**\Swagger\Client\Model\Account**](Account.md) |  | [optional] 
**amortization_account** | [**\Swagger\Client\Model\Account**](Account.md) | The Amortization account. AmortizationAccountId, amortizationStartDate and amortizationEndDate should be provided. If amortizationStartDate and amortizationEndDate are provided, while amortizationAccountId is NULL, then the default amortization account will be used. | [optional] 
**amortization_start_date** | **string** | Amortization start date. AmortizationAccountId, amortizationStartDate and amortizationEndDate should be provided. | [optional] 
**amortization_end_date** | **string** |  | [optional] 
**customer** | [**\Swagger\Client\Model\Customer**](Customer.md) |  | [optional] 
**supplier** | [**\Swagger\Client\Model\Supplier**](Supplier.md) |  | [optional] 
**employee** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**project** | [**\Swagger\Client\Model\Project**](Project.md) |  | [optional] 
**product** | [**\Swagger\Client\Model\Product**](Product.md) |  | [optional] 
**department** | [**\Swagger\Client\Model\Department**](Department.md) |  | [optional] 
**vat_type** | [**\Swagger\Client\Model\VatType**](VatType.md) |  | [optional] 
**amount** | **float** |  | [optional] 
**amount_currency** | **float** |  | [optional] 
**amount_gross** | **float** |  | [optional] 
**amount_gross_currency** | **float** |  | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) |  | [optional] 
**close_group** | [**\Swagger\Client\Model\CloseGroup**](CloseGroup.md) |  | [optional] 
**invoice_number** | **string** |  | [optional] 
**term_of_payment** | **string** |  | [optional] 
**row** | **int** |  | [optional] 
**type** | **string** |  | [optional] 
**external_ref** | **string** | External reference for identifying payment basis of the posting, e.g., KID, customer identification or credit note number. | [optional] 
**system_generated** | **bool** |  | [optional] 
**tax_transaction_type** | **string** |  | [optional] 
**matched** | **bool** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


