<div {{ $attributes->class(["text-sm rounded-md bg-ash3  p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10"])}}>
    <div {{$attributes->class(["flex flex-wrap items-center justify-between"])}}>
        <div class="w-full flex-grow sm:w-auto">
            {{$slot}}
        </div>
    </div>
</div>