

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

    @if($player->isAccount() )
      <div class="ui right blue corner label">
        <i class="child icon"></i>
      </div>
    @endif
    
    @foreach( $roles as $role)
      @if( $player->is($role->slug) )
        <div class="ui {{ $role->color }} ribbon label">
        @if( $role->icon)
          <i class="{{ $role->icon }} icon"></i> 
        @endif
        {{$role->name}}
        </div>
      @endif
    @endforeach

  </div>
    <div class="content">
      <a class="header">{{$player->nickname}}</a>
      <div class="meta">
        <span class="date">Added {{ $player->created_at->format('F jS, Y') }}</span>
      </div>
      <div class="description">
        {{ $player->bio }}
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
