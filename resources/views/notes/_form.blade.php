@props(['note' => null])


<div class="space-y-6">
    <div>
        <label class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" value="{{ old('title', $note->title ?? '') }}" maxlength="100"
            class="mt-1 block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
        @error('title')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div>
        <label class="block text-sm font-medium text-gray-700">Content</label>
        <textarea name="content" rows="8" class="mt-1 block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('content', $note->content ?? '') }}</textarea>
        @error('content')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div class="flex items-center gap-3">
        <button class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-gray hover:bg-indigo-700">Save</button>
        <a href="{{ route('notes.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
    </div>
</div>