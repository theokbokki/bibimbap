<div class="grid | gy-8">
    @if ($label ?? null)
        <label class="{{ $required ?? false ? 'field-required' : '' }}" for="{{ $name }}">
            {{ $label }}
        </label>
    @endif
    <div class="smooth | field-wrapper">
        <input autocomplete="off" type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}"
            class="py-12 px-16 radius-8 smooth | field" placeholder="{{ $placeholder ?? '' }}" value="{{ old($name) }}"
            {{ $required ?? false ? 'required' : '' }}>
    </div>
    @error($name)
        <p class="clr-error text-small" role="alert">{{ $message }}</p>
    @enderror
</div>
