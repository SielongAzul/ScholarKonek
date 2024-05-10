<x-layout>
    <x-breadcrumbs :links="['My Scholarships' => route('my-scholarships.index'), 'Edit Scholarship' =>'#']" class='mb-4'/>

    <x-card>

    
        <form action="{{route('my-scholarships.update', $scholarship)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Scholarship Title</x-label>
                    <x-text-input name="title" :value="$scholarship->title"/>
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" :value="$scholarship->location"/>
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true" >Description</x-label>
                    <x-text-input name="description" type="textarea" :value="$scholarship->description"/>
                </div>
                <div class="col-span-2">
                    <x-label for="requirements" :required="true">Requirements</x-label>
                    <x-text-input name="requirements" type="textarea" :value="$scholarship->requirements "/>
                </div>
          
                <div>
                    <x-label for="schoolname" :required="true">School Name</x-label>
                    <x-text-input name="schoolname" :value="$scholarship->schoolname" />
                </div>

               

                <div>
                    <x-label for="contactno" :required="true">Contact No</x-label>
                    <x-text-input name="contactno" type="number" :value="$scholarship->contactno"/>
                </div>

                
                <div class="col-span-2">
                    <x-label for="grade_needed" :required="true">Grade Needed</x-label>
                    <x-text-input name="grade_needed" type="number" :value="$scholarship->grade_needed"/>
                </div>
                
                <div class="col-span-2">
                    <x-label for="monetary_value" :required="true">Cash Assistance</x-label>
                    <x-text-input  name="monetary_value" type="number" :value="$scholarship->monetary_value"/>
                </div>

                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" :value="$scholarship->category" :all-option="false" :value="$scholarship->category" :options="array_combine(array_map('ucfirst',\App\Models\Scholarship::$category), \App\Models\Scholarship::$category)"/>
                </div>

                <div>
                    <x-label for="grants">Grants</x-label>
                    <x-radio-group name="grants" :value="$scholarship->grants" :all-option="false" :value="$scholarship->grants" :options="\App\Models\Scholarship::$grants"/>
                </div>
            </div>
          <x-button class="w-full"> Update Scholarship</x-button>
        </form>
    </x-card>
</x-layout>