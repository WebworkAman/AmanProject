<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ViewController extends Controller
{
    public function __invoke(){
        return view('OC40N02') 
        -> with('messages',Message::all());
    }

    function OC1(){
        return view('OC1') 
        -> with('messages',Message::all());
    }
    function OC5B(){
        return view('OC5B') 
        -> with('messages',Message::all());
    }

    function OC83(){
        return view('OC83') 
        -> with('messages',Message::all());
    }

    function UW2(){
        return view('UW2') 
        -> with('messages',Message::all());
    }

    function UW2S(){
        return view('UW2S') 
        -> with('messages',Message::all());
    }

    function OC100(){
        return view('OC100') 
        -> with('messages',Message::all());
    }

    function OSP2000II(){
        return view('OSP2000II') 
        -> with('messages',Message::all());
    }

    function OSP2008(){
        return view('OSP2008') 
        -> with('messages',Message::all());
    }
    //拉布

    function M190G(){
        return view('M190G') 
        -> with('messages',Message::all());
    }
    function J3(){
            return view('J3') 
            -> with('messages',Message::all());
        }

    function KPro(){
            return view('KPro') 
            -> with('messages',Message::all());
    }

    function KProLite(){
        return view('KProLite') 
        -> with('messages',Message::all());
    }

    function F8(){
        return view('F8') 
        -> with('messages',Message::all());
    }

    function T5(){
        return view('T5') 
        -> with('messages',Message::all());
    }
    
    //裁剪

    function OneCut(){
        return view('OneCut') 
        -> with('messages',Message::all());
    }

    function M6S(){
        return view('M6S') 
        -> with('messages',Message::all());
    }

    function TAC(){
        return view('TAC') 
        -> with('messages',Message::all());
    }

    function OC510(){
        return view('OC510') 
        -> with('messages',Message::all());
    }

    function OB90(){
        return view('OB90') 
        -> with('messages',Message::all());
    }

    function A100U(){
        return view('A100U') 
        -> with('messages',Message::all());
    }

    function LU933(){
        return view('LU933') 
        -> with('messages',Message::all());
    }

    function OB700A(){
        return view('OB700A') 
        -> with('messages',Message::all());
    }

    // <*--------  整燙定型 -----------*>

    function OP800(){
        return view('OP800') 
        -> with('messages',Message::all());
    }

    function OP87(){
        return view('OP87') 
        -> with('messages',Message::all());
    }

    function OP302(){
        return view('OP302') 
        -> with('messages',Message::all());
    }

    function OP301(){
        return view('OP301') 
        -> with('messages',Message::all());
    }

    function OP122A(){
        return view('OP122A') 
        -> with('messages',Message::all());
    }

    function OP500(){
        return view('OP500') 
        -> with('messages',Message::all());
    }

    function OP606(){
        return view('OP606') 
        -> with('messages',Message::all());
    }

    function OP120T(){
        return view('OP120T') 
        -> with('messages',Message::all());

    }

    function OP535(){
        return view('OP535') 
        -> with('messages',Message::all());
    }

    function OP565(){
        return view('OP565') 
        -> with('messages',Message::all());
    }

    function OP5881(){
        return view('OP5881') 
        -> with('messages',Message::all());
    }

    function OP5851(){
        return view('OP5851') 
        -> with('messages',Message::all());
    }
    // <*--------  摺衣 -----------*>
    

    // <*--------  包裝 -----------*>

    function OFC1(){
        return view('product/category/packaging/OFC1') 
        -> with('messages',Message::all());
    }

    function OFC450(){
        return view('product/category/packaging/OFC450') 
        -> with('messages',Message::all());
    }

    function OSZ50(){
        return view('product/category/packaging/OSZ50') 
        -> with('messages',Message::all());
    }

    function OSZK02(){
        return view('product/category/packaging/OSZK02') 
        -> with('messages',Message::all());
    }

    function OSZ50X(){
        return view('product/category/packaging/OSZ50X') 
        -> with('messages',Message::all());
    }

    function OSZ50N(){
        return view('product/category/packaging/OSZ50N') 
        -> with('messages',Message::all());
    }

    function OSZ50XN(){
        return view('product/category/packaging/OSZ50XN') 
        -> with('messages',Message::all());
    }

    // <*--------  其他機械 -----------*>

    function ON5(){
        return view('product/category/others/ON5') 
        -> with('messages',Message::all());
    }
    function ONCM(){
        return view('product/category/others/ONCM') 
        -> with('messages',Message::all());
    }

    function WLS301(){
        return view('product/category/others/WLS301') 
        -> with('messages',Message::all());
    }
    function OM78(){
        return view('product/category/others/OM78') 
        -> with('messages',Message::all());
    }
    function OB201L(){
        return view('product/category/others/OB201L') 
        -> with('messages',Message::all());
    }
    function OP408S(){
        return view('product/category/others/OP408S') 
        -> with('messages',Message::all());
    }
    function OP747(){
        return view('product/category/others/OP747') 
        -> with('messages',Message::all());
    }
    function OW40(){
        return view('product/category/others/OW40') 
        -> with('messages',Message::all());
    }
    function DSFS(){
        return view('product/category/others/DSFS') 
        -> with('messages',Message::all());
    }
    function OP102A(){
        return view('product/category/others/OP102A') 
        -> with('messages',Message::all());
    }
   

    
}
