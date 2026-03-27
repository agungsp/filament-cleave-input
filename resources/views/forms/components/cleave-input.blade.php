<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @php
        $prefixActions = $getPrefixActions();
        $prefixIcon = $getPrefixIcon();
        $prefixLabel = $getPrefixLabel();
        $suffixActions = $getSuffixActions();
        $suffixIcon = $getSuffixIcon();
        $suffixLabel = $getSuffixLabel();
    @endphp

    <div
        x-data="cleaveInputComponent({
            state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }},
            cleaveType: @js($getCleaveType()),
            options: @js($getCleaveOptions())
        })"
    >
        <x-filament::input.wrapper
            :disabled="$isDisabled()"
            :inline-prefix="$isPrefixInline()"
            :inline-suffix="$isSuffixInline()"
            :prefix="$prefixLabel"
            :prefix-actions="$prefixActions"
            :prefix-icon="$prefixIcon"
            :prefix-icon-color="$getPrefixIconColor()"
            :suffix="$suffixLabel"
            :suffix-actions="$suffixActions"
            :suffix-icon="$suffixIcon"
            :suffix-icon-color="$getSuffixIconColor()"
            :valid="! $errors->has($getStatePath())"
            class="fi-fo-text-input"
            :attributes="
                \Filament\Support\prepare_inherited_attributes($getExtraAttributeBag())
                    ->class(['overflow-hidden'])
            "
        >
            <x-filament::input
                :attributes="
                    \Filament\Support\prepare_inherited_attributes($getExtraInputAttributeBag())
                        ->merge([
                            'autofocus' => $isAutofocused(),
                            'disabled' => $isDisabled(),
                            'id' => $getId(),
                            'inlinePrefix' => $isPrefixInline() && (count($prefixActions) || $prefixIcon || filled($prefixLabel)),
                            'inlineSuffix' => $isSuffixInline() && (count($suffixActions) || $suffixIcon || filled($suffixLabel)),
                            'placeholder' => $getPlaceholder(),
                            'readonly' => $isReadOnly(),
                            'required' => $isRequired() && (! $isConcealed()),
                            'type' => 'text',
                            'x-on:input' => 'handleInput',
                            'x-ref' => 'cleaveInput',
                        ], escape: false)
                "
            />
        </x-filament::input.wrapper>
    </div>
</x-dynamic-component>
