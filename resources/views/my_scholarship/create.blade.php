<x-layout>
    <x-breadcrumbs :links="['My Scholarships' => route('my-scholarships.index'), 'Create' =>'#']" class='mb-4'/>

    <x-card>

    
        <form action="{{route('my-scholarships.store')}}" method="POST">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Scholarship Title</x-label>
                    <x-text-input name="title"/>
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location"/>
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true" >Description</x-label>
                    <x-text-input name="description" type="textarea"/>
                </div>
                <div class="col-span-2">
                    <x-label for="requirements" :required="true">Requirements</x-label>
                    <x-text-input name="requirements" type="textarea"/>
                </div>
          
                <div>
                    <x-label for="schoolname" :required="true">School Name</x-label>
                    <x-text-input name="schoolname"/>
                </div>

               

                <div>
                    <x-label for="contactno" :required="true">Contact No</x-label>
                    <x-text-input name="contactno" type="number"/>
                </div>

                
                <div class="col-span-2">
                    <x-label for="grade_needed" :required="true">Grade Needed</x-label>
                    <x-text-input name="grade_needed" type="number"/>
                </div>
                
                <div class="col-span-2">
                    <x-label for="monetary_value" :required="true">Cash Assistance</x-label>
                    <x-text-input  name="monetary_value" type="number"/>
                </div>

                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group name="category" :value="old('category')" :all-option="false" :options="array_combine(array_map('ucfirst',\App\Models\Scholarship::$category), \App\Models\Scholarship::$category)"/>
                </div>

                <div>
                    <x-label for="grants">Grants</x-label>
                    <x-radio-group name="grants" :value="old('category')" :all-option="false" :options="\App\Models\Scholarship::$grants"/>
                </div>
            </div>
          <x-button class="w-full"> Publish Scholarship</x-button>
        </form>
    </x-card>
</x-layout>