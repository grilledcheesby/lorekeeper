@extends('user.layout')

@section('profile-title') {{ $user->name }}'s Characters @endsection

@section('profile-content')
{!! breadcrumbs(['Users' => 'users', $user->name => $user->url, 'Characters' => $user->url . '/characters']) !!}

<h1>
    {!! $user->displayName !!}'s Characters
</h1>

@if(Auth::check() && Auth::user()->hasPower('manage_characters'))
    @if($admin_characters->count())
        <div class="row">
            @foreach($admin_characters as $character)
                <div class="col-md-3 col-6 text-center mb-2">
                    <div>
                        <a href="{{ $character->url }}"><img src="{{ $character->image->thumbnailUrl }}" class="img-thumbnail" /></a>
                    </div>
                    <div class="mt-1 h5">
                        @if(!$character->is_visible) <i class="fas fa-eye-slash"></i> @endif {!! $character->displayName !!}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No characters found.</p> 
    @endif
@else
    @if($characters->count())
        <div class="row">
            @foreach($characters as $character)
                <div class="col-md-3 col-6 text-center mb-2">
                    <div>
                        <a href="{{ $character->url }}"><img src="{{ $character->image->thumbnailUrl }}" class="img-thumbnail" /></a>
                    </div>
                    <div class="mt-1 h5">
                        {!! $character->displayName !!}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No characters found.</p> 
    @endif
@endif

@endsection
