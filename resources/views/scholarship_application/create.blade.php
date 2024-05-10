<x-layout>
    <x-breadcrumbs class="mb-4"
    :links="[
        'Scholarships' => route('scholarships.index'),
        $scholarship->title => route('scholarships.show', $scholarship),
        'Apply' => '#',
    ]" />

    <x-job-card :$scholarship />

    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
          </h2>


          <form action="{{ route('scholarships.application.store', $scholarship) }}" method="POST"
          enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <x-label for="graduated_at" :required="true">School Attended: </x-label>
            <x-text-input type="text" name="graduated_at" />
          </div>

          <div class="mb-4">
            <x-label for="schoolyear_start" :required="true">School Year Start: </x-label>
            <x-text-input type="number" name="schoolyear_start" />
          </div>
          <div class="mb-4">
            <x-label for="schoolyear_finish" :required="true">School Year End: </x-label>
            <x-text-input type="number" name="schoolyear_finish" />
          </div>
          <div class="mb-4">
            <x-label for="grade" :required="true">Grade: </x-label>
            <x-text-input type="number" name="grade" />
          </div>

          <div class="mb-4">
            <x-label for="age" :required="true">Age: </x-label>
            <x-text-input type="number" name="age" />
          </div>

          <div class="mb-4">
            <x-label for="address" :required="true">Address: </x-label>
            <x-text-input type="text" name="address" />
          </div>

          <div class="mb-4">
            <x-label for="contactnumber" :required="true">Your Contact No: </x-label>
            <x-text-input type="text" name="contactnumber" />
          </div>

          <div class="mb-4">
            <x-label for="emailadd" :required="true">Your Email Address: </x-label>
            <x-text-input type="text" name="emailadd" />
          </div>

          <div class="mb-4">
            <x-label for="grades_doc" :required="true">Upload Grades</x-label>
            <x-text-input type="file" name="grades_doc"/>
          </div>


          <div class="mb-4">
            <x-label for="itr_doc">Upload Income Tax Return</x-label>
            <x-text-input type="file" name="itr_doc"/>
          </div>

          <div class="mb-4">
            <x-label for="letter_doc">Letter of Approval</x-label>
            <x-text-input type="file" name="letter_doc"/>
          </div>
          <div class="mb-4">
            <x-label for="birthcert_doc" :required="true">Birth Certificate</x-label>
            <x-text-input type="file" name="birthcert_doc"/>
          </div>
          <div class="mb-4">
            <x-label for="others_doc">Other Documents - Eg ID</x-label>
            <x-text-input type="file" name="others_doc"/>
          </div>
          <div class="mb-4">
            <x-label for="photo_img" :required="true">Photo 2x2 </x-label>
            <x-text-input type="file" name="photo_img"/>
          </div>


          <x-button class="w-full">Apply</x-button>

          </form>
    </x-card>
</x-layout>