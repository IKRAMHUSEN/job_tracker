@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Add Application</h2>
        <form action="{{ route('applications.store') }}" method="POST" class="bg-white rounded-xl border border-gray-200 p-6">
            @csrf
            @include('applications.partials._form')
            <div class="flex items-center gap-4 mt-6">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm font-medium">Save
                    Application</button>
                <a href="{{ route('applications.index') }}" class="text-gray-500 text-sm hover:text-gray-700">Cancel</a>
            </div>
        </form>
    </div>
@endsection
