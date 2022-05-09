<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <h3 class="text-2xl leading-6 font-bold text-gray-900">Screening Information</h3>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mt-4" :status="session('status')" />

        <div class="w-full sm:max-w-2xl mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Screening Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Subject details and result.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="even:bg-white odd:bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">First Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $screening->first_name }}</dd>
                    </div>
                    <div class="even:bg-white odd:bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Date of Birth - Age</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $screening->dob?->format('F j, Y') }} - {{ $screening->dob?->age }} Year(s)</dd>
                    </div>
                    <div class="even:bg-white odd:bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Headache Frequency Type</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $screening->headache_frequency_type?->label() }}</dd>
                    </div>
                    @if($screening->headache_frequency_type == \App\Enum\HeadacheFrequencyType::daily)
                        <div class="even:bg-white odd:bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Headache Daily Frequency</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $screening->daily_frequency_headache?->label() }} time(s).</dd>
                        </div>
                    @endif
                    <div class="even:bg-white odd:bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Assigned To</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $screening->assigned_to?->label() }}</dd>
                    </div>
                    <div class="even:bg-white odd:bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Result</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Participant `{{ $screening->first_name }}` assigned to `{{ $screening->assigned_to?->label() }}`.</dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="my-2">
            <a
                href="{{ route('screenings.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
            >Back</a>
        </div>

    </div>
</x-guest-layout>
