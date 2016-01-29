

<div class="ui card">
  <div class="blurring dimmable image">
    <div class="ui dimmer">
      <div class="content">
        <div class="center">
          <div class="ui inverted button">View Details</div>
        </div>
      </div>
    </div>
    {!! $player->profileImage(300, 300) !!}
  </div>
    <div class="content">
      <a class="header">{{$player->nickname}}</a>
      <div class="meta">
        <span class="date">Added {{ $player->created_at->format('F jS, Y') }}</span>
      </div>
      <div class="description">
        Descriptions go here
      </div>
    </div>
    <div class="extra content">
      <span class="right floated">

      @if($player->playthroughs->count() > 0)
        Last Played
       {{ $player->playthroughs->last()->created_at->format('M j, Y') }}
      @endif
      </span>
        <i class="game icon"></i>
        {{$player->playthroughs->count() }} Plays
    </div>
  </div>
