@extends('layouts.verifiedemail')
@section('image-meta')
    @if(isset($event))
        {{ asset('img/bg-event/'.$event->photos) }}
    @else
        {{ asset('img/bg-event/header.jpg') }}
    @endif
@endsection
@section('content')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="title">Meetups</h2>
				</div>
				@foreach ($events as $event)
					<div class="col-md-12"><hr></div>
					<div class="col-md-2">
						@if(isset($event))
							<div class="card">
								<div class="card-header" data-background-color="red">
									<ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
										<li class="nav-item ">{{ Carbon\Carbon::parse($event->start_datetime)->format('F') }} </li>
									</ul>
								</div>
								<p style="font-size: 3.5em;margin-bottom: 0px;" class="text-center">{{ Carbon\Carbon::parse($event->start_datetime)->format('d') }}</p>
								<p style="font-size: 1.8em;" class="text-center">{{ Carbon\Carbon::parse($event->start_datetime)->format('Y') }}</p>
							</div>
						@endif
					</div>
					<div style="margin-bottom: 20px;" class="col-md-10">
						@if(isset($event))
	                        <div class="col-md-12">
	                        	<h3 class="title-event">{{ $event->name }}</h3>
		                        <h4 class="description ">{{ Carbon\Carbon::parse($event->start_datetime)->format('l, d F Y') }} — {{ Carbon\Carbon::parse($event->start_datetime)->format('g:i A') }} - {{ Carbon\Carbon::parse($event->end_datetime)->format('g:i A') }}</h4>
		                        <p class="description ">{{ $event->place_name }} — <a href="http://maps.google.com.au/?daddr={{ $event->place_name }}"  target="_blank">Directions</a></p>

		                        <div class="row">
                                	<div class="col-md-12"><p class="description">{{ $event->desc }}</p></div>
	                                @if(count($event->topic) > 0)
	                                	<div style="margin-top: 20px;" class="col-md-12 text-center"><h3>What the topics?</h3></div>
	                                    @foreach($event->topic as $topic)
	                                        <div class="col-md-5">
	                                            <h3 class="card-title">
	                                                <span>{{$topic->title}}</span>
	                                            </h3>
	                                        </div>
	                                        <div class="col-md-7">
	                                            <p class="card-description">
	                                                {{ $topic->desc }}
	                                            </p>
	                                            <p class="author">
	                                                @foreach ($topic->speakers as $speaker)
	                                                    by <a href="{{ url('/member/'.str_slug($speaker->name)) }}"><b>{{ $speaker->name }}</b></a>
	                                                @endforeach
	                                            </a>
	                                        </div>
	                                    @endforeach
	                                @else
	                                    <h3 class="ml-auto mr-auto">There's no topic yet</h3>
	                                @endif
	                            </div>
	                        </div>
                        	@if(Auth::guard('web')->check())
		                        @php
		                        	$value['exists'] = false;
		                        	if($event->rsvp != []) {
			                        	foreach ($event->rsvp as $rsvp) {
			                        		$is_rsvp = false;
			                        		if($rsvp->id_user == Auth::user()->id) {
			                        			$is_rsvp = true;
			                        			$value['exists'] = true;
			                        		}
			                        	}
		                        	}
		                        @endphp
		                        @if(!$value['exists'])
					                @if($loop->first)
					               <div class="col-md-12" >
					                    <div class="card card-contact card-raised card-plain">
					                        <div class="text-center">
					                            <a href="{{ route('home.rsvp', ['slug' => $event->slug]) }}" class="btn btn-info btn-lg btn-round ">RSVP NOW</a>
					                        </div>
					                    </div>
					                </div>
					                @else
					                <div class="col-md-12" >
					                    <div class="card card-contact card-raised card-plain">
					                        <div class="text-center">
					                            <button type="button" class="btn btn-info btn-lg btn-round ">Event Done</button>
					                        </div>
					                    </div>
					                </div>
					                @endif
					            @else
					                <div class="col-md-12" >
					                    <div class="card card-contact card-raised card-plain">
					                        <div class="text-center">
					                            <button type="button" class="btn btn-info btn-lg btn-round ">Registered</button>
					                        </div>
					                    </div>
					                </div>
					            @endif
					        @else
					        	@if($loop->first)
				               <div class="col-md-12" >
				                    <div class="card card-contact card-raised card-plain">
				                        <div class="text-center">
				                            <a href="{{ route('home.rsvp', ['slug' => $event->slug]) }}" class="btn btn-info btn-lg btn-round ">RSVP NOW</a>
				                        </div>
				                    </div>
				                </div>
				                @else
				                <div class="col-md-12" >
				                    <div class="card card-contact card-raised card-plain">
				                        <div class="text-center">
				                            <button type="button" class="btn btn-info btn-lg btn-round ">Event Done</button>
				                        </div>
				                    </div>
				                </div>
				                @endif
					        @endif
	                    @else
	                        <h1 class="title">No Event Yet!</h1>
	                    @endif
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
