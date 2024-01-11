<x-reader-layout>
  
    <x-slot name="title">
       novelglot - {{ $post->title }}
    </x-slot>

    <div class="special-container essay mb-5">

        <h1 class="text-center pt-5 pb-5" >{{ $post->title }}</h1>

        <div class="essay-body mb-5">
            {!! str_replace("\n\n", "</p>\n<p>", ($post->content)) !!}
        </div>

    </div>

</x-reader-layout>
