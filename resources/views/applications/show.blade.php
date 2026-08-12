@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-6 flex items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800 mb-6">Application Details</h2>
            </div>

            <a href="{{ route('applications.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-800">
                <x-heroicon-o-arrow-left class="w-4 h-4" />
                Back to Applications
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="flex flex-col gap-4 border-b border-gray-200 p-6 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="text-sm text-gray-500">Current status</p>
                    <span
                        class="mt-2 inline-flex rounded-full px-3 py-1 text-sm font-medium {{ $application->statusColor() }}">
                        {{ ucfirst($application->status) }}
                    </span>
                </div>

                <div class="text-left sm:text-right">
                    <p class="text-sm text-gray-500">Applied on</p>
                    <p class="mt-1 font-medium text-gray-900">{{ $application->applied_at->format('F j, Y') }}</p>
                </div>
            </div>

            <dl class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Company</dt>
                    <dd class="mt-1 text-gray-900">{{ $application->company }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Role</dt>
                    <dd class="mt-1 text-gray-900">{{ $application->role }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Current CTC</dt>
                    <dd class="mt-1 text-gray-900">{{ $application->current_ctc ?: 'N/A'}}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Expected CTC</dt>
                    <dd class="mt-1 text-gray-900">{{ $application->expected_ctc ?: 'N/A'}}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Interview on</dt>
                    <dd class="mt-1 text-gray-900">{{ $application->interview_on ? $application->interview_on->format('F j, Y') : 'Not specified' }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Location</dt>
                    <dd class="mt-1 text-gray-900">{{ $application->location ?: 'N/A'}}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Notice period</dt>
                    <dd class="mt-1 text-gray-900">{{ $application->notice_period ?: 'N/A'}}</dd>
                </div>

                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Notes</dt>
                    <dd class="mt-1 whitespace-pre-line text-gray-900">{{ $application->notes ?: 'No notes added.' }}</dd>
                </div>
            </dl>

            <div class="flex items-center gap-3 border-t border-gray-200 bg-gray-50 px-6 py-4">
                <a href="{{ route('applications.edit', $application) }}"
                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500">
                    Edit application
                </a>

                <form action="{{ route('applications.destroy', $application) }}" method="POST"
                    onsubmit="return confirm('Delete this application?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-lg px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
