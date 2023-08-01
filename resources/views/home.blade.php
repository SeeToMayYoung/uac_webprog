@extends('layout.master')
@section('content')
    @foreach ($users as $user)
        @if ((auth()->check()))
            @if (($user->id != auth()->user()->id))
                <a href="/view/{{$user->id}}">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
                        <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{$user->name}}</div>
                        <p class="text-gray-700 text-base">
                            Hello! My name is {{$user->name}} and my main profession is {{$user->fow1}}. <br>
                            Here are some of my other work interests:
                        </p>
                        </div>
                        <div class="px-6 pb-2">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$user->fow1}}</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$user->fow2}}</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$user->fow3}}</span>
                        </div>
                    </div>
                </a>
            @endif
        @else
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                {{-- <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains"> --}}
                <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{$user->name}}</div>
                <p class="text-gray-700 text-base">
                    Hello! My name is {{$user->name}} and my main profession is {{$user->fow1}}. <br>
                    Here are some of my other work interests:
                </p>
                </div>
                <div class="px-6 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$user->fow1}}</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$user->fow2}}</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$user->fow3}}</span>
                </div>
            </div>
        @endif
    @endforeach
@endsection
