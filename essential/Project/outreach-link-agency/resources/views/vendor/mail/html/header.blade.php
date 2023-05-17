@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
    @if (trim($slot) === 'OutreachLinkAgency')
        <img src="{{ asset('assets/images/logo.png') }}" alt="Outreachlink Logo" style="max-width: 200px;">
    @else
{{ $slot }}
@endif
</a>
</td>
</tr>
