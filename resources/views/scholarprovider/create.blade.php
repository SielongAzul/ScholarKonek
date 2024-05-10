<x-layout>
    <x-card>
        <form action="{{route('scholarprovider.store')}}" method="POST">
            @csrf
            <div class="mb-4">
            <x-label for="provider_name" :required="true">Scholarship Provider Name</x-label>
                <x-text-input name="provider_name"/>
            </div>
            <x-button class="w-full"> Create Account</x-button>
        </form>
    </x-card>
</x-layout>