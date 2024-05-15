<x-card class="mb-4">
    <div class="flex items-center justify-between">
    

        <h2 class="text-lg font-medium">{{$scholarship->title}}</h2>
        <div class="text-slate-500">
            Cash Assistance: ₱  {{$scholarship->monetary_value}}
            
        </div>
        @if ($scholarship->deleted_at)
        <span class="text-xs text-red-500">Deleted</span>
      @endif
       
    </div>
    <div class="mb-4 flex justify-between text-center text-sm text-slate-500 items-center">
        <div class="flex space-x-4">
           <div>{{$scholarship->scholarprovider->provider_name}}</div> 
           <div>Grade Needed: {{$scholarship->grade_needed}}</div>
    
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag><a href="{{route('scholarships.index',['category'=>$scholarship->category])}}"> 
                 {{Str::ucfirst($scholarship->category)}}</a>
              </x-tag>

         <x-tag>
            <a href="{{route('scholarships.index',['grants'=>$scholarship->grants])}}"> 
                {{Str::ucfirst($scholarship->grants)}}</a>
           </x-tag>
    
         </div>
    
    </div>
   
    <div>
            {{$slot}}
    </div>
    </x-card>