<x-layout>


    <x-breadcrumbs class="mb-4"
    :links="['Scholarships' => route('scholarships.index'), $scholarship->title => '#']" />
    
    
    <x-job-card :$scholarship>

        <p class="text-sm text-slate-500 pb-2">
            {{!!nl2br( e($scholarship->description) )!!}}
        </p>

        @can('apply', $scholarship)
        <x-link-button :href="route('scholarships.application.create', $scholarship)">Apply Scholarship</x-link-button>
        @else
        <div class="text-center text-sm font-medium text-slate-500">
            You are already applied!

        </div>
        @endcan
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{$scholarship->scholarprovider->provider_name}} Scholarships
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($scholarship->scholarprovider->scholarships as $otherScholarship)
            <div class="mb-4 flex justify-between">
                <div>
                 <div class="text-slate-700">
                    <a href="{{route('scholarships.show',$otherScholarship)}}">{{$otherScholarship->title}}</a></div>
                    {{$otherScholarship->schoolname}}
                    <div class="text-xs">{{$otherScholarship->created_at->diffForHumans()}}</div>
                 </div>
                <div>
                    {{$otherScholarship->category}} |
                    {{$otherScholarship->grants}}
                    
                </div>
                

            </div>
                
            @endforeach

        </div>
    </x-job-card>
    
</x-layout>