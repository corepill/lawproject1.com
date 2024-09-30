<div class="bg-white rounded-lg">
    <div class="relative bg-inherit">
        <input type="{{ $type }}" id="{{ $for }}" name="{{ $for }}"
            class="w-[100%] peer bg-transparent h-10  rounded-md placeholder-transparent ring-2 px-2 ring-orange-500 focus:ring-orange-600 focus:outline-none focus:border-orange-600"
            placeholder="{{ $title }}" value="{{ isset($item) ? $item : '' }}" />
        <label for="{{ $for }}"
            class="absolute cursor-text left-0 -top-3 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-orange-600 peer-focus:text-sm transition-all select-none rounded-md">{{ $title }}
        </label>
    </div>
</div>
