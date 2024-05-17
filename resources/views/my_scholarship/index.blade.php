<x-layout>
<x-breadcrumbs class="mb-4"
    :links="['Published Scholarships' => '#']" />
    
    <div class="mb-8 text-right">
        <x-link-button href="{{route('my-scholarships.create')}}">Publish New Scholarships</x-link-button>
    </div>



    @forelse($scholarships as $scholarship)
    <x-job-card :$scholarship>
        <div class="text-xs text-slate-500">
            @forelse($scholarship->scholarshipApplications as $application)
            <div class="mb-4 flex items-center justify-between">
            <div>
              <div>{{ $application->user->name }}</div>
              <div>Entered Input</div>
              <div>Studied at: {{$application->graduated_at}}</div>  
              <div>School Year: {{$application->schoolyear_start}}-{{$application->schoolyear_finish}}</div>
              <div>Entered Grade: {{$application->grade}}</div>  
              <div>Entered Age: {{$application->age}}</div>  
              <div>Entered Contact: {{$application->contactnumber}}</div>
              <div>Entered Email: {{$application->emailadd}}</div>    
              <div>
                Applied {{ $application->created_at->diffForHumans() }}
              </div>
              <div>
                Download Documents
              </div>
            </div>

          </div>
            @empty
                <div>No applications yet.</div>
            @endforelse
        </div>
        <div class = "flex space-x-2">
        <x-link-button href="{{route('my-scholarships.edit',$scholarship)}}"> Edit</x-link-button>
        <form action="{{ route('my-scholarships.destroy', $scholarship) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-button>Delete</x-button>
          </form>
</div>
    </div>
    </x-job-card>
  
@empty
    <p>No scholarships available.</p>
@endforelse
</x-layout>



