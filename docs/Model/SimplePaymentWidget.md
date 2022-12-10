# SimplePaymentWidget

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_types** | [**\Swagger\Client\Model\PaymentWidgetPaymentType[]**](PaymentWidgetPaymentType.md) | List of payment types used in this Payment Widget | [optional] 
**selected_payment_type** | [**\Swagger\Client\Model\PaymentWidgetPaymentType**](PaymentWidgetPaymentType.md) | Default payment type for this Payment Widget | [optional] 
**date** | **string** | Date of the payment to be registered in the Payment Widget | [optional] 
**amount** | [**\Swagger\Client\Model\TlxNumber**](TlxNumber.md) | Amount of the payment to be registered in the Payment Widget | [optional] 
**bank_account** | **string** | Bank account used to register payment in the Payment Widget | [optional] 
**kid** | **string** | Kid used to register payment in the Payment Widget | [optional] 
**read_only_bank_account** | **bool** | Field for making the bank account field readOnly in the Payment Widget | [optional] 
**read_only_kid** | **bool** | Field for making the kid field readOnly in the Payment Widget | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


