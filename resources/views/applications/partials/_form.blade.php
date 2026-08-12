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

    {{-- salary --}}
    <div>
        <label for="salary_range" class="mb-2 block text-sm font-semibold text-gray-700">Salary Range</label>
        <input type="text" name="salary_range" id="salary_range"
            value="{{ old('salary_range', $application->salary_range ?? '') }}" placeholder=" RS. 15-20 LPA"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none">

        @error('salary_range')
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
