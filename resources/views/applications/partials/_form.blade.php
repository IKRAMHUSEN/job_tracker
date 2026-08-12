<div class="space-y-6">

    {{-- company --}}
    <div>
        <label for="company" class="mb-2 block text-sm font-semibold text-gray-700">Company</label>
        <input type="text" name="company" id="company" value="{{ old('company', $application->company ?? '') }}"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">

        @error('company')
            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- role --}}
    <div>
        <label for="role" class="mb-2 block text-sm font-semibold text-gray-700">Role</label>
        <input type="text" name="role" id="role" value="{{ old('role', $application->role ?? '') }}"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">

        @error('role')
            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        {{-- applied at --}}
        <div>
            <label for="applied_at" class="mb-2 block text-sm font-semibold text-gray-700">Applied At</label>

            <input type="date" name="applied_at" id="applied_at"
                value="{{ old('applied_at', isset($application->applied_at) ? $application->applied_at->format('Y-m-d') : '') }}"
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">


            @error('applied_at')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        {{-- status --}}
        <div>
            <label for="status" class="mb-2 block text-sm font-semibold text-gray-700">Status</label>
            <select name="status" id="status"
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">
                @foreach (['applied' => 'Applied', 'interview' => 'Interview', 'offer' => 'Offer', 'rejected' => 'Rejected'] as $key => $label)
                    <option value="{{ $key }}"
                        {{ old('status', $application->status ?? 'applied') === $key ? 'selected' : '' }}
                        value="{{ $key }}">
                        {{ $label }}</option>
                @endforeach
            </select>

            @error('status')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror

        </div>
    </div>

    {{-- current ctc --}}
    <div>
        <label for="current_ctc" class="mb-2 block text-sm font-semibold text-gray-700">Current CTC</label>
        <input type="text" name="current_ctc" id="current_ctc"
            value="{{ old('current_ctc', $application->current_ctc ?? '') }}" placeholder="Enter your current CTC"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">

        @error('current_ctc')
            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- expected ctc --}}
    <div>
        <label for="expected_ctc" class="mb-2 block text-sm font-semibold text-gray-700">Expected CTC</label>
        <input type="text" name="expected_ctc" id="expected_ctc"
            value="{{ old('expected_ctc', $application->expected_ctc ?? '') }}" placeholder="Enter your expected CTC"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">

        @error('expected_ctc')
            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- location --}}
    <div>
        <label for="location" class="mb-2 block text-sm font-semibold text-gray-700">Location</label>
        <input type="text" name="location" id="location"
            value="{{ old('location', $application->location ?? '') }}" placeholder="Enter your location"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">

        @error('location')
            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- interview on --}}
    <div>
        <label for="interview_on" class="mb-2 block text-sm font-semibold text-gray-700">Interview On</label>

        <input type="date" name="interview_on" id="interview_on"
            value="{{ old('interview_on', isset($application->interview_on) ? $application->interview_on->format('Y-m-d') : '') }}"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">


        @error('interview_on')
            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- notice period --}}
    <div>
        <label for="notice_period" class="mb-2 block text-sm font-semibold text-gray-700">
            Notice Period
        </label>

        <select name="notice_period" id="notice_period"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">

            <option value="">Select notice period</option>

            @foreach ([0 => 'Immediate', 15 => '15 Days', 30 => '1 Month', 45 => '45 Days', 60 => '2 Months', 90 => '3 Months'] as $key => $label)
                <option value="{{ $key }}"
                    {{ old('notice_period', $application->notice_period ?? '') == $key ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach

        </select>

        @error('notice_period')
            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>


    {{-- notes --}}
    <div>
        <label for="notes" class="mb-2 block text-sm font-semibold text-gray-700">Notes</label>
        <textarea name="notes" id="notes" rows="4"
            class="w-full resize-y rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">{{ old('notes', $application->notes ?? '') }}</textarea>
        @error('notes')
            <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>
