<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Edit Note</h2>
    </x-slot>


    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl bg-white p-6 shadow">
                <form method="POST" action="{{ route('notes.update', $note) }}">
                    @csrf
                    @method('PUT')
                    @include('notes._form', ['note' => $note])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>