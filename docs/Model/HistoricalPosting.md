# HistoricalPosting

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**voucher** | [**\Swagger\Client\Model\Voucher**](Voucher.md) |  | [optional] 
**date** | **string** | The posting date. | 
**description** | **string** | The description of the posting. | [optional] 
**account** | [**\Swagger\Client\Model\Account**](Account.md) | The ledger account of the posting. | 
**customer** | [**\Swagger\Client\Model\Customer**](Customer.md) |  | [optional] 
**supplier** | [**\Swagger\Client\Model\Supplier**](Supplier.md) |  | [optional] 
**employee** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**project** | [**\Swagger\Client\Model\Project**](Project.md) |  | [optional] 
**product** | [**\Swagger\Client\Model\Product**](Product.md) |  | [optional] 
**department** | [**\Swagger\Client\Model\Department**](Department.md) |  | [optional] 
**vat_type** | [**\Swagger\Client\Model\VatType**](VatType.md) |  | [optional] 
**amount** | **float** | The posting amount in company currency. Important: The amounts in this amount field must have sum &#x3D; 0 on all the dates. If multiple postings with different dates, then the sum must be 0 on each of the dates. | 
**amount_currency** | **float** | The posting amount in posting currency. | 
**amount_gross** | **float** | The posting gross amount in company currency. | 
**amount_gross_currency** | **float** | The posting gross amount in posting currency. | 
**amount_vat** | **float** | The amount of vat on this posting in company currency (NOK). | 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) | Posting currency. | 
**invoice_number** | **string** | Invoice number. | [optional] 
**term_of_payment** | **string** | Due date. | [optional] 
**close_group** | **string** | Optional. Used to create a close group for postings. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


