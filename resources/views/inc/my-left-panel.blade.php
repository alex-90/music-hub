<div class="left-panel">
    <h4>Меню</h4>
  
    <ul>
        <li>
            <a href="{{ route('my') }}" class="link-primary">My Playlist</a>
        </li>

        @if (Auth::user()->is_admin)
        <li>
            <a href="{{ route('admin') }}" class="link-primary">Admin Panel</a>
        </li>
        @endif

    </ul>


</div>