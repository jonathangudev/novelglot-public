<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <script src="https://cdn.tiny.cloud/1/wio5bmyz5jvxaul0xwo6ma6oyonst3bi6fplz0lk4od0h8wc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({ selector:'#content-area' });
        </script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="/posts/edit/{{$post->id}}" method="POST">

                    @csrf

                    <div class="w-full py-4">
                        <label class="text-base font-semibold leading-7 text-gray-900">
                            Title</label>
                        <input class=" border-zinc-300	w-full	rounded-md shadow-sm ring-2 ring-inset ring-gray-100 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-400" 
                            type="text" name="title" for="title"
                            value="{{ $post->title }}"
                            >
                    </div>

                    <div class="w-full py-4">
                    <label class="text-base font-semibold leading-7 text-gray-900">
                            Content</label>
                        <textarea class="w-full rounded-md shadow-sm ring-2 border-zinc-300	 ring-inset ring-gray-100 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-400"
                            id="content-area"
                            type="textarea" name="content" for="content"
                            rows=10> {{$post->content }}
                        </textarea>
                    </div>

                    <button class="py-2 px-4 bg-blue-500 hover:bg-blue-400 border border-blue-400 text-white rounded font-extrabold shadow-md" type="submit">
                        Submit
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
