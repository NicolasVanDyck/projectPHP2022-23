@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src=" {{asset('assets/logo/Logo WZD.png')}}" class="logo" alt="WZD Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
