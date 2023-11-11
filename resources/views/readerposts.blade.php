
<x-reader-layout>
    <x-slot name="title">
       novelglot
    </x-slot>

    <div class="special-container essay">

        <h1 class="text-center pt-5 pb-5" >Contents</h1>

        <div class="essay-body">
            <ul class="">
                @foreach($posts as $post)
                    <li ><a href="posts/{{ $post->slug }}" class=" text-decoration-none">{{ $post->title }}</a></li>
                @endforeach
            </ul>
        </div>

    </div>

</x-reader-layout>
