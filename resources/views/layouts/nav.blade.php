<html>
<nav>
        <div class="nav-left">
            <h1>Oshima QA</h1>
        </div>
        <div class="nav-right">
        @if (MemberAuth::isLoggedIn())
           <p>Hi,{{ MemberAuth::member()->email }}</p>
           <form method="POST" action="{{ route('members.session.delete') }}">
                    @csrf
                   @method('DELETE')
              <button type="submit">Log out</button>
           </form>
        @else
               <div class="text"><a href="{{ route('members.session.create') }}">Log in</a></div>
               <div class="text"><a href="{{ route('members.create') }}">Register</a></div>
         @endif

        </div>
    </nav>
</html>