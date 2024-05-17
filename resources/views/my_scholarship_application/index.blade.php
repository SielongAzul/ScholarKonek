<x-layout>

    <x-breadcrumbs class="mb-4"
    :links="['My Job Applications' => '#']" />

    @forelse ($applications as $application)
    <x-job-card :scholarship="$application->scholarship">
        <div class="flex items-center justify-between text-xs text-slate-500">

            <div>
                <div>
                    Applied {{$application->created_at->diffForHumans()}}
                    <div>Entered Input</div>
                  <div>Studied at: {{$application->graduated_at}}</div>  
                  <div>School Year: {{$application->schoolyear_start}}-{{$application->schoolyear_finish}}</div>
                  <div>Entered Grade: {{$application->grade}}</div>  
                  <div>Entered Age: {{$application->age}}</div>  
                  <div>Entered Contact: {{$application->contactnumber}}</div>
                  <div>Entered Email: {{$application->emailadd}}</div>    

                </div>
                
                
            </div>
            <div>
              
                <form action="{{route('my-scholarship-applications.destroy', $application)}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <x-button>Cancel</x-button>
                </form>
            </div>
        </div>
    </x-job-card>
 
    @empty


    <div class="rounded-md border border-dashed border-slate-300 p-8">
        <div class="text-center font-medium">
          Sadly, you haven't applied to any scholarships yet.
        </div>
        <div class="text-center">
          Go find some scholarships <a class="text-indigo-500 hover:underline"
            href="{{ route('scholarships.index') }}">here!</a>
        </div>
      </div>
    @endforelse    
</x-layout>

