<html>
<nav>
        <div class="nav-left">
            <img src="https://www.oshima.com.tw/archive/image/weblogo/1644210634.jpg" alt="">
        </div>
        <div class="nav-right">
        @if (MemberAuth::isLoggedIn())
            <ul>
                <li><p>Hi,{{ MemberAuth::member()->email }}</p></li>
                <li>
                <form method="POST" action="{{ route('members.session.delete') }}">
                    @csrf
                   @method('DELETE')
                <button type="submit">Log out</button>
                </form>
                </li>
            </ul>
           
          
        @else
               <ul>
                <li><a href="{{ route('members.session.create') }}">Log in</a></li>
                <li>|</li>
                <li><a href="{{ route('members.create') }}">Register</a></li>
               </ul>
               
               
         @endif

        </div>
    </nav>
</html>