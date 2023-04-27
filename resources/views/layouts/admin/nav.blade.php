<html>
<nav>
        <div class="nav-left">
            <a href="{{asset('')}}"><img src="https://www.oshima.com.tw/archive/image/weblogo/1644210634.jpg"></a>
            
        </div>
        <div class="nav-right">
       
         
            <ul>
                
                <li>
                <form method="POST" action="{{ route('admin.session.delete') }}">
                    @csrf
                   @method('DELETE')
                <button type="submit"> 登 出 </button>
                </form>
                </li>
            </ul>   
         

        </div>
    </nav>
</html>