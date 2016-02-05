@extends('app')

@section('title', $player->nickname )

@section('content')

<div class="ui centered segment">
	<img src="{!! $player->profile(236, 236) !!}" alt="" class="ui small image">
	<span class="meta">{{$player->created_at->format('F jS, Y')}}</span>
	<br>
	<p>{{ $player->bio }}</p>
	<h2>Pretty graphs to go here?</h2>
</div>

	<h2>Previous Games Played</h2>
	
	<div class="ui divided items">
		@foreach($player->playthroughs as $p)
		<div class="item">
			<div class="ui tiny image">
				{!! $p->game->coverImage() !!}
			</div>
			<div class="content">
				<div class="header">{{ $p->game->name }}</div>
				<div class="meta">Played {{$p->played->format('F jS, Y') }}</div>
				<p>{{ $p->notes }}</p>
				
				<div class="ui ordered horizontal list">
					@foreach( $p->players as $player)
							<div class="item">
							<img class="ui avatar image" src="{{ $player->profile() }}">
							<div class="content">
							<div class="header">{{ $player->nickname }}</div>
							{{$player->score}} Schmeckles
							</div>
						</div>
					@endforeach
				</div>
				
			</div>
		</div>
		@endforeach
	</div>


<script>

</script>
@endsection