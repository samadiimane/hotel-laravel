@php
    $setting = App\Models\SiteSetting::find(1);
@endphp
<footer class="page-footer">
			<p class="mb-0">{{ $setting->copyright }}</p>
</footer>