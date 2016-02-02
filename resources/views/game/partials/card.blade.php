

<div class="ui card">
  <div class="blurring dimmable image">
      <div class="ui dimmer">
        <div class="content">
          <div class="center">
            <div class="ui inverted button">View Details</div>
          </div>
        </div>
      </div>
    <img src="{{ GlideImage::load($game->photo) }}">
  </div>
  <div class="content">
    <a class="header">{{$game->name}}</a>
    <div class="meta">
      <span class="date">Added {{ $game->created_at->format('F jS, Y') }}</span>
    </div>
    <div class="description">
      {{ $game->description }}
    </div>
  </div>
  <div class="extra content">
    <span class="right floated">

    @if($game->playthroughs->count() > 0)
      Last Played
     {{ $game->playthroughs->last()->created_at->format('M j, Y') }}
    @endif
    </span>
      <i class="game icon"></i>
      {{$game->playthroughs->count() }} Plays
  </div>
</div>