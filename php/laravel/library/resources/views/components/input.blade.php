<div class="relative">
    <label for="{{$name}}" class="text-sm font-medium text-gray-700 -mb-3">{{ucfirst($name)}}</label>
    <input {{ $attributes->merge([
    'class' => 'h-10 w-full rounded-sm bg-emerald-100/50 mb-8 px-2 text-emerald-950 placeholder:text-emerald-600/80
    focus:outline-none'
    ]) }}
    @if(isset($value)) value="{{ $value }}" @endif/>
    @error($name)
    <p class="text-red-500 text-xs absolute bottom-0 left-0">{{ $message }}</p>
    @enderror
</div>