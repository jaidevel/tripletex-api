# PurchaseOrder

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**number** | **string** | Purchase order number | [optional] 
**receiver_email** | **string** | Email when purchase order is send by email. | [optional] 
**discount** | **float** | Discount Percentage | [optional] 
**internal_comment** | **string** |  | [optional] 
**packing_note_message** | **string** | Message on packing note.Wholesaler specific. | [optional] 
**transporter_message** | **string** | Message to transporter.Wholesaler specific. | [optional] 
**comments** | **string** | Delivery information and invoice comments | [optional] 
**supplier** | [**\Swagger\Client\Model\Supplier**](Supplier.md) |  | 
**delivery_date** | **string** |  | 
**received_date** | **string** |  | [optional] 
**order_lines** | [**\Swagger\Client\Model\PurchaseOrderline[]**](PurchaseOrderline.md) | Order lines tied to the purchase order | [optional] 
**project** | [**\Swagger\Client\Model\Project**](Project.md) | Project/order | [optional] 
**department** | [**\Swagger\Client\Model\Department**](Department.md) | Department/order | [optional] 
**delivery_address** | [**\Swagger\Client\Model\Address**](Address.md) | Delivery address | [optional] 
**creation_date** | **string** |  | [optional] 
**is_closed** | **bool** |  | [optional] 
**our_contact** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | 
**supplier_contact** | [**\Swagger\Client\Model\Employee**](Employee.md) | Recipient when purchase order is send by email. | [optional] 
**attention** | [**\Swagger\Client\Model\Employee**](Employee.md) | Attention | [optional] 
**status** | **string** |  | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) | Company currency | [optional] 
**restorder** | [**\Swagger\Client\Model\PurchaseOrder**](PurchaseOrder.md) |  | [optional] 
**transport_type** | [**\Swagger\Client\Model\TransportType**](TransportType.md) | Transport type | [optional] 
**pickup_point** | [**\Swagger\Client\Model\PickupPoint**](PickupPoint.md) | Pickup point, wholesaler specific | [optional] 
**document** | [**\Swagger\Client\Model\Document**](Document.md) | The PDF representing this PurchaseOrder | [optional] 
**attachment** | [**\Swagger\Client\Model\Document**](Document.md) | The attachments on this PurchaseOrder (if any) | [optional] 
**edi_document** | [**\Swagger\Client\Model\Document**](Document.md) | The machine readable document (such as EHF or EFO/NELFO) this PurchaseOrder is based on (if any) | [optional] 
**last_sent_timestamp** | **string** |  | [optional] 
**last_sent_employee_name** | **string** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


