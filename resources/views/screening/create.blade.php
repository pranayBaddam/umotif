
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h3 class="text-2xl leading-6 font-bold text-gray-900">Screening Form</h3>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('screenings.store') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-label for="first_name" :required="true" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

            <!-- Date Of Birth -->
            <div class="mt-4">
                <x-label for="dob" :required="true" :value="__('Date Of Birth')" />

                <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required />
            </div>

            <div x-data="{open: false}">
                <!-- Headache Frequency Type -->
                <div class="mt-4">
                    <x-label for="headache_frequency_type" :value="__('Headache Frequency Type')" :required="true" />
                    <x-select
                        @change="open = $event.target.value == {{ \App\Enum\HeadacheFrequencyType::daily->value }}"
                        name="headache_frequency_type" id="headache_frequency_type" class="block mt-1 w-full"
                    >
                        <option value="">Select Headache Frequency Type...</option>
                        @foreach(\App\Enum\HeadacheFrequencyType::cases() as $frequencyType)
                            <option
                                value="{{ $frequencyType->value }}"
                                @selected(old('headache_frequency_type') == $frequencyType->value)
                            >{{ $frequencyType->label() }}</option>
                        @endforeach
                    </x-select>
                </div>

                <!-- Daily Headache Frequency -->
                <div class="mt-4" x-show="open">
                    <x-label for="daily_headache_frequency" :value="__('Daily Headache Frequency')"/>
                    <x-select name="daily_headache_frequency" id="daily_headache_frequency" x-bind:disabled="open == false" class="block mt-1 w-full">
                        <option value="">Select Daily Frequency...</option>
                        @foreach(\App\Enum\HeadacheDailyFrequencyType::cases() as $frequencyType)
                            <option
                                value="{{ $frequencyType->value }}"
                                @selected(old('daily_headache_frequency') == $frequencyType->value)
                            >{{ $frequencyType->label() }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
