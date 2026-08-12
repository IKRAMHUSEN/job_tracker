@extends('layouts.app')

@section('content')
    {{-- header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Job Applications</h2>
            <p class="text-gray-500 text-sm">Track every application in one place</p>
        </div>

        {{-- add application --}}
        <a href="{{ route('applications.create') }}"
            class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 hover:text-blue-800">
            <x-heroicon-o-plus class="w-4 h-4" />
            Add Application
        </a>
    </div>

    {{-- stats --}}
    <div class="grid grid-cols-4 gap-4 mb-6">
        {{-- total applications --}}
        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <p class="text-gray-500 text-sm">Total Applications</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] }}</p>
        </div>

        {{-- applied applications --}}
        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <p class="text-gray-500 text-sm">Applied</p>
            <p class="text-2xl font-bold text-blue-500">{{ $stats['applied'] }}</p>
        </div>

        {{-- interview applications --}}
        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <p class="text-gray-500 text-sm">Interview</p>
            <p class="text-2xl font-bold text-yellow-500">{{ $stats['interview'] }}</p>
        </div>

        {{-- offer applications --}}
        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <p class="text-gray-500 text-sm">Offer</p>
            <p class="text-2xl font-bold text-green-500">{{ $stats['offer'] }}</p>
        </div>

        {{-- rejected applications --}}
        <div class="bg-white rounded-xl border border-gray-200 p-4">
            <p class="text-gray-500 text-sm">Rejected</p>
            <p class="text-2xl font-bold text-red-500">{{ $stats['rejected'] }}</p>
        </div>
    </div>


    {{-- status filter --}}
    <div class="flex gap-2 mb-6">
        <a href="{{ route('applications.index') }}"
            class="px-3 py-1 rounded-full text-xs font-medium {{ !$status ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 border border-gray-200 hover:border-color-200' }}">
            All
        </a>
        @foreach (['applied' => 'Applied', 'interview' => 'Interview', 'offer' => 'Offer', 'rejected' => 'Rejected'] as $key => $label)
            <a href="{{ route('applications.index', ['status' => $key]) }}"
                class="px-3 py-1 rounded-full text-xs font-medium {{ $status === $key ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 border border-gray-200 hover:border-color-200' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    {{-- applications table --}}
    @if ($applications->isEmpty())
        <div class="text-center py-16 bg-white rounded-xl border border-dashed border-gray-200">
            <x-heroicon-o-briefcase class="w-10 h-10 text-gray-400 mx-auto mb-3" />
            <p class="text-gray-500 font-medium">No applications found</p>
            <p class="text-gray-400 text-sm">Add your first application to get started</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($applications as $application)
                <div class="bg-white rounded-xl border border-gray-200 p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <h3 class="font-semibold text-gray-900">{{ $application->company }}</h3>
                            <p class="text-gray-500">{{ $application->role }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $application->statusColor() }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>

                    {{-- date --}}
                    <div class="flex items-center gap-1 text-xs text-gray-400 mb-3"> <x-heroicon-o-calendar
                            class="w-3 h-3" />
                        Applied {{ $application->applied_at->format('M j, Y') }}
                    </div>

                    {{-- actions --}}
                    <div class="flex items-center gap-3 text-sm">
                        <a href="{{ route('applications.edit', $application) }}"
                            class="text-indigo-600 hover:text-indigo-500 font-medium">
                            <x-heroicon-o-pencil class="w-4 h-4 inline-block mr-1" />
                        Edit
                        </a>

                        <form action="{{ route('applications.destroy', $application) }}" method="POST"
                            onsubmit="return confirm('Delete this application?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-500 hover:text-red-600 font-medium cursor-pointer">
                                <x-heroicon-o-trash class="w-4 h-4 inline-block mr-1" />
                                Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
