<html>
<nav>
        <div class="nav-left">
            <a href="{{asset('')}}"><img src="https://www.oshima.com.tw/archive/image/weblogo/1644210634.jpg"></a>
            
        </div>
        <div class="nav-right">
        @if (MemberAuth::isLoggedIn())
         
            <ul>
                <li><p>Hi,{{ MemberAuth::member()->name }}</p></li>
                <li>
                <form method="POST" action="{{ route('members.session.delete') }}">
                    @csrf
                   @method('DELETE')
                <button type="submit">Log out</button>
                </form>
                </li>
            </ul>     
         @endif

        </div>
    </nav>
</html>