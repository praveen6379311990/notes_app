<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Notes') }}
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-50 p-3 text-green-700">{{ session('status') }}</div>
            @endif


            <div class="mb-4 flex items-center justify-between">
                {{-- <form action="{{ route('notes.index') }}" method="get" class="flex gap-2">
                    <input name="q" value="{{ request('q') }}" placeholder="Search title..." class="rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" />
                    <button class="rounded-lg bg-gray-100 px-3 py-2 hover:bg-gray-200">Search</button>
                </form> --}}
                <a href="{{ route('notes.create') }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-gray hover:bg-indigo-700">New Note</a>
            </div>


            <div class="overflow-hidden rounded-2xl bg-white shadow">
                <ul class="divide-y divide-gray-100">
                    @forelse ($notes as $note)
                    <li class="p-4 hover:bg-gray-50">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <a href="{{ route('notes.show', $note) }}" class="text-lg font-semibold text-gray-900 hover:underline">{{ $note->title }}</a>
                                <p class="mt-1 line-clamp-2 text-sm text-gray-600">{{ Str::limit(strip_tags($note->content), 140) }}</p>
                            </div>
                            <div class="text-right text-sm text-gray-500">
                                <p>Created: {{ $note->created_at->format('d M Y, H:i') }}</p>
                                {{-- <div class="mt-2 flex justify-end gap-2">
                                    <a href="{{ route('notes.edit', $note) }}" class="rounded-md bg-white px-3  py-1.5 text-sm text-indigo-600 ring-1 ring-inset ring-gray-200 hover:bg-gray-50">Edit</a>
                                    <form method="POST" action="{{ route('notes.destroy', $note) }}" onsubmit="return confirm('Delete this note?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-md bg-white px-3 py-1.5 text-sm text-red-600 ring-1 ring-inset ring-gray-200 hover:bg-gray-50">Delete</button>
                                    </form>
                                </div> --}}

                                <div class="mt-2 flex justify-end">
    <a href="{{ route('notes.edit', $note) }}" 
       class="rounded-md bg-white px-3 py-1.5 text-sm text-indigo-600 ring-1 ring-inset ring-gray-200 hover:bg-gray-50">
       Edit
    </a>
    <form method="POST" action="{{ route('notes.destroy', $note) }}" onsubmit="return confirm('Delete this note?');">
        @csrf
        @method('DELETE')
        <button class="ml-1 rounded-md bg-white px-3 py-1.5 text-sm text-red-600 ring-1 ring-inset ring-gray-200 hover:bg-gray-50">
            Delete
        </button>
    </form>
</div>
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="p-6 text-center text-gray-500">No notes yet.</li>
                    @endforelse
                </ul>
            </div>


            <div class="mt-4">{{ $notes->withQueryString()->links() }}</div>
        </div>
    </div>
</x-app-layout>