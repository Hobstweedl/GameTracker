
	<div class="card">

		<div class="blurring dimmable image">

			<div class="ui dimmer">
				<div class="content">
					<div class="ui grid">
					<div class="twelve wide column">
					<div class="ui items">
						@foreach( $play->players as $player)

							<div class="item">
							    <img class="ui avatar image" src="{{ $player->profile() }}">
							    <div class="content">
							      <span class="header" style="color: #ccc">{{ $player->nickname }} - {{ $player->score }}</span>
							    </div>
							  </div>
						@endforeach
					</div>
					</div>
					</div>
				</div>
			</div>

			<img src="{{ GlideImage::load($play->game->photo) }}">
		</div>

		<div class="content">

			<div class="header">{{ $play->game->name}}</div>

			<div class="meta">
			</div>

			<div class="description">
			{{ $play->notes }}
			</div>

		</div>
		<div class="extra content">

			<span class="right floated">
			{{ $play->played->format('F jS, Y') }}
			</span>

			<span>
			<strong>Duration : </strong>
			{{ $play->duration->format('G:i') }}
			</span>
		</div>
	</div>