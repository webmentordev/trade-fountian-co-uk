<x-mail::message>
# Order Processed  
Dear {{ $name }},

Exciting news! We're delighted to inform you that your order with Trade Fountain has been successfully processed and is now on its way to you.

Here's a quick summary:

**Order ID:** {{ $id }}  

You can track the status of your shipment using the tracking information provided here.
<x-mail::button :url="route('track.order', ['order_id' => $id])">
Order Status
</x-mail::button>  

Should you have any questions or require further assistance, feel free to contact our dedicated customer support team at **support@tradefountain.co.uk**.

Thank you for choosing Trade Fountain. We appreciate your business!

Best Regards,<br>
Trade Fountain
</x-mail::message>