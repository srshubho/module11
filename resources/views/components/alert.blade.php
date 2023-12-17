@php
    $types = [
        'success' => 'alert-success',
        'danger' => 'alert-danger',
        'warning' => 'alert-warning',
        'info' => 'alert-info',
    ];
@endphp
<div {{ $attributes->merge(['class' => 'alert' . $types[$type]]) }} role="alert">
    <strong> {{ $slot }} </strong>
</div>
