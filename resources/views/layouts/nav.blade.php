<html>
<nav>
    <div class="nav-left">
        <a href="{{ asset('') }}"><img src="https://www.oshima.com.tw/archive/image/weblogo/1644210634.jpg"></a>

    </div>
    <div class="nav-right">
        @if (MemberAuth::isLoggedIn())

            <ul>
                <li>
                    <p>Hi,{{ MemberAuth::member()->name }}</p>
                </li>
                <li>
                    <img id="hamburger-icon" src="{{ asset('imgs/icon/user.png') }}">
                </li>

                <li>
                    <form method="POST" action="{{ route('members.session.delete') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"> 登 出 </button>
                    </form>
                </li>
            </ul>
            <ul id="hamburger-menu">
                <li><a href="{{ asset('memberBasic') }}">客戶基本資料</a></li>
                <div class="menu-line"></div>
                @if (MemberAuth::member()->identity_perm == 1 || MemberAuth::member()->identity_perm == 2)
                    <li><a href="{{ asset('companyMemberList') }}">群組管理</a></li>
                @else
                @endif
                <div class="menu-line"></div>
                <li><a href="{{ asset('companyMachineList') }}">機器基本資料</a></li>
            </ul>
        @endif

    </div>
</nav>
<script>
    $(document).ready(function() {
        // 點擊圖片時切換漢堡選單的顯示與隱藏
        $('#hamburger-icon').on('click', function() {
            $('#hamburger-menu').toggleClass('show');
        });
    });
</script>

</html>
