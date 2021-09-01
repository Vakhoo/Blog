<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full  text-left flex lg:inline-flex">
            {{isset($currentCategory) ? ucwords($currentCategory->name) : "Categories"}}
            <x-icon class="absolute pointer-events-none" style="right: 12px;" name="down-arrow"/>
        </button>
    </x-slot>
    {{-- {{isset($currentCategory) && $currentCategory->id==$category->id ? "bg-blue-500 text-white" : ""}} --}}
{{--    @dd(request()->getQueryString())--}}
    <x-dropdown-item href="/?{{http_build_query(request()->except('category', 'page'))}}" :active="request()->getQueryString() === null">All</x-dropdown-item>
    @foreach ($categories as $category)
        <x-dropdown-item
        href="/?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}"
        :active="(isset($currentCategory) && $currentCategory->id === $category->id)"
{{--          :active="isset($currentCategory) && $currentCategory->id==$category->id" --}}
        {{-- :active="(isset($currentCategory) && $currentCategory->id === $category->id)" --}}
{{--                            :active="request()->is('categories/'.$category->slug)"--}}
{{--                            :active="isset($currentCategory) ? false : request()->routeIs('home')"--}}
        >
            {{$category->name}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
