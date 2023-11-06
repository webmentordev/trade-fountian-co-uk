<x-mail::message>
# Order Confirmation
 
Thank you for choosing Trade Fountain! We're thrilled to let you know that we've received your order.  
We are currently processing your order and will notify you once it has been shipped. If you have any questions or need further assistance, feel free to reply to this email or contact our customer support at **support@tradefountain.co.uk**
## OrderID:  
{{ $order_id }}  
<x-mail::table>
| Product       | Quantity         | Price  |
| ------------- |:-------------:| --------:|
@foreach ($data as $item)
| {{ $item->product->short_name }}      | {{ $item->quantity }}      | {{ $item->total }}      |
@endforeach
</x-mail::table>
 
<x-mail::button :url="route('track.order', ['order_id' => $order_id])">
Order Status
</x-mail::button>
 
Thanks,<br>
Trade Fountain / Dujana LTD
</x-mail::message>