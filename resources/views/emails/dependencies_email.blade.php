{{-- use mail::table to show tabular data in wider email body --}}
@component('mail::table')
### Dependencies Email

If there are any dependencies can be upgraded, please seriously consider to upgrade them to avoid possible security threats.

{{-- use <pre> to show all whitespaces in string, so that tabular data can be showed properly --}}
<pre>
{{-- use fixed width font Courier New, so that tabular data can be showed properly --}}
<p style="font-family: Courier New">
{!! nl2br(e($output))!!}
</p>
</pre>

Thanks,<br>
{{ config('app.name') }}
@endcomponent