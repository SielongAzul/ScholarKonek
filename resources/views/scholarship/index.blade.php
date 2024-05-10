<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="['Scholarships' => route('scholarships.index')]"/>    


    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref="filters" id="filtering-form" action="{{route('scholarships.index')}}" method="GET">
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <div class="mb-1 font-semibold"> Search </div>
                <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text" form-ref="filters"/>
            </div>
            <div>
                <div class="mb-1 font-semibold"> Cash Assitance </div>
                 <div class="flex space-x-2">
                 <x-text-input name="min_money" value="{{request('min_money')}}" placeholder="From" form-ref="filters"/>
                 <x-text-input name="max_money" value="{{request('max_money')}}" placeholder="To" form-ref="filters"/>
            </div>
            </div>
            <div>
                <div class="mb-1 font-semibold"> Scholarship Type </div>
                <x-radio-group name="category" :options="array_combine(array_map('ucfirst',\App\Models\Scholarship::$category), \App\Models\Scholarship::$category)"/>
        </div>
        
            <div>    <div class="mb-1 font-semibold"> Scholarship Type </div>
            <x-radio-group name="grants" :options="\App\Models\Scholarship::$grants"/>
        </div>
        </div>
        <x-button class="w-full">Filter</x-button>
    </form>
    </x-card>
@foreach ($scholarships as $scholarship)
<x-job-card class="mb-4" :scholarship="$scholarship">
    <x-link-button :href="route('scholarships.show',$scholarship)"> 
        View Scholarship Info
    </x-link-button>
</x-job-card>
@endforeach

</x-layout>
