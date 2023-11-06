@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('assets/logo.png') }}" class="logo" alt="Trade Fountain Logo">
@else
<img src="{{ asset('assets/logo.png') }}" class="logo" alt="Trade Fountain Logo">
@endif
</a>
</td>
</tr>
