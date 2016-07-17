@extends('layouts.master')

@section('content')

    @include('partials.page-header')
    <div class="container" id="profile">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img alt="" class="profile-img lg" src="{{ $avatar }}"/>
                                <div class="contacts">
                                    <a href="{{ $user->provider_url }}" tittle="Google Plus">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                    <a href="{{ $user->Map }}">
                                        <i class="fa fa-map-marker"></i>
                                    </a>
                                    @if(!empty($telegram))
                                        <a href="https://telegram.me/{{ $telegram }}" title="Telegram">
                                            <i class="fa fa-paper-plane"></i>
                                        </a>
                                    @endif
                                    @if(Auth::check() && Auth::user()->id == $user->id)
                                        <a href="{{ route('user.edit', $user->id) }}" title="Edit Profile">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @if(!Auth::user()->verified)
                                            {!! Toastr::info('Your account is being reviewed for verification', 'Verification') !!}
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-9">
                                <table class="table table-responsive table-striped">
                                    <tr>
                                        <td><span class="bold">Name:</span></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="bold">Agent:</span></td>
                                        <td>{{ $user->agent }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="bold">Location:</span></td>
                                        <td>{{ $user->Location }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="bold">Level:</span></td>
                                        <td>{{ $user->level }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="bold">Status:</span></td>
                                        <td>@if($user->verified) Verified @else Unverified @endif</td>
                                    </tr>
                                    @if(!empty($badges))
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                @foreach($badges as $badge)
                                                    <img
                                                            class="ingress-badges left"
                                                            src="{{ asset('images/badges/'.$badge.'.png') }}"
                                                    />
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection