<!-- https://codepen.io/lhermann/pen/EBGZRZ -->
<style>
    .toggle__dot {
        top: -.25rem;
        left: -.25rem;
        transition: all 0.3s ease-in-out;
    }

    input:checked ~ .toggle__dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }

    input:checked ~ .toggle__line {
        background-color: #b5c9b1;
    }
</style>

<div>
    <label for="{{ $name }}" class="flex items-center cursor-pointer">
        <!-- toggle -->
        <div class="relative">
            <!-- input -->
            <input name="{{ $name }}" id="{{ $name }}" type="checkbox" class="hidden" {!! $attributes->merge(['class' => 'toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer']) !!} {{ $checked ? 'checked' : '' }} />
            <!-- line -->
            <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
            <!-- dot -->
            <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
        </div>
        <!-- label -->
        <div class="ml-3 text-gray-400">{{ $checked ? $label : $slot }}</div>
    </label>
</div>