<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Question;

class ViewController extends Controller
{

    // <*--------  驗布 -----------*>

    public function __invoke(){
        return view('product/category/inspection/OC40N02');
        // -> with('questions',Question::all());
    }
    function OC1(){
        $questions = Question::with('answers')->where('product_id', 2)->get();
        return view('product/category/inspection/OC1', compact('questions')) ;
    }
    function OC5B(){
        $questions = Question::where('product_id', 3)->get();
        return view('product/category/inspection/OC5B', compact('questions')) ;
    }
    function OC83(){
        $questions = Question::where('product_id', 4)->get();
        return view('product/category/inspection/OC83', compact('questions')) ;
    }

    // <*--------  鬆布 -----------*>

    function UW2(){
        $questions = Question::where('product_id', 5)->get();
        return view('product/category/relaxing/UW2', compact('questions')) ;
    }

    function UW2S(){

        $questions = Question::where('product_id', 6)->get();
        return view('product/category/relaxing/UW2S', compact('questions')) ;
    }

    function OC100(){

        $questions = Question::where('product_id', 7)->get();
        return view('product/category/relaxing/OC100', compact('questions')) ;
       
    }

    function OSP2000II(){

        $questions = Question::where('product_id', 8)->get();
        return view('product/category/relaxing/OSP2000II', compact('questions')) ;
    
    }

    function OSP2008(){

        $questions = Question::where('product_id', 9)->get();
        return view('product/category/relaxing/OSP2008', compact('questions')) ;
       
    }
    
    // <*--------  拉布 -----------*>

    function M190G(){
        $questions = Question::where('product_id', 10)->get();
        return view('product/category/spreading/M190G', compact('questions')) ;
    }
    function J3(){
        $questions = Question::where('product_id', 11)->get();
            return view('product/category/spreading/J3', compact('questions')) ;
        }

    function KPro(){
        $questions = Question::where('product_id', 12)->get();
            return view('product/category/spreading/KPro', compact('questions')) ;
    }

    function KProLite(){
        $questions = Question::where('product_id', 13)->get();
        return view('product/category/spreading/KProLite', compact('questions')) ;
    }

    function F8(){
        $questions = Question::where('product_id', 14)->get();
        return view('product/category/spreading/F8', compact('questions')) ;
    }

    function T5(){
        $questions = Question::where('product_id', 15)->get();
        return view('product/category/spreading/T5', compact('questions')) ;
    }

    function K5(){
        $questions = Question::where('product_id', 44)->get();
        return view('product/category/spreading/K5', compact('questions')) ;
    }
    
     // <*--------  裁剪 -----------*>

    function OneCut(){
        $questions = Question::where('product_id', 16)->get();
        return view('product/category/cutting/OneCut', compact('questions'));
    }

    function M6S(){
        $questions = Question::where('product_id', 17)->get();
        return view('product/category/cutting/M6S', compact('questions'));
    }

    function TAC(){

        $questions = Question::where('product_id', 18)->get();
        return view('product/category/cutting/TAC', compact('questions'));  
    }

    function OC510(){
        $questions = Question::where('product_id', 19)->get();
        return view('product/category/cutting/OC510', compact('questions'));
    }

    function OB90(){
        $questions = Question::where('product_id', 20)->get();
        return view('product/category/cutting/OB90', compact('questions'));
    }

    function A100U(){
        $questions = Question::where('product_id', 21)->get();
        return view('product/category/cutting/A100U', compact('questions'));
    }

    function LU933(){
        $questions = Question::where('product_id', 22)->get();
        return view('product/category/cutting/LU933', compact('questions'));
    }

    function OB700A(){
        $questions = Question::where('product_id', 23)->get();
        return view('product/category/cutting/OB700A', compact('questions'));
    }

    // <*--------  整燙定型 -----------*>

    function OP800SDS(){
        $questions = Question::where('product_id', 24)->get();
        return view('product/category/ironing/OP800SDS', compact('questions'));
    }

    function OP87(){
        $questions = Question::where('product_id', 25)->get();
        return view('product/category/ironing/OP87', compact('questions'));
    }

    function OP302(){
        $questions = Question::where('product_id', 26)->get();
        return view('product/category/ironing/OP302', compact('questions'));
    }

    function OP301(){
        return view('product/category/ironing/OP301');
    }

    function OP122A(){
        return view('product/category/ironing/OP122A');
    }

    function OP500(){
        return view('product/category/ironing/OP500') 
        ;
    }

    function OP606(){
        return view('product/category/ironing/OP606') 
        ;
    }

    function OP120T(){
        return view('product/category/ironing/OP120T') 
        ;

    }

    function OP535(){
        return view('product/category/ironing/OP535') 
        ;
    }

    function OP565(){
        return view('product/category/ironing/OP565') 
        ;
    }

    function OP5881(){
        return view('product/category/ironing/OP5881') 
        ;
    }

    function OP5851(){
        return view('product/category/ironing/OP5851') 
        ;
    }
    // <*--------  轉印 -----------*>

    function OP10A5(){
        $questions = Question::where('product_id', 27)->get();
        return view('product/category/heatTransfer/OP10A5', compact('questions'));
    }
    
    function OP380A(){
        $questions = Question::where('product_id', 28)->get();
        return view('product/category/heatTransfer/OP380A', compact('questions'));
    }

    function OP15A(){
        $questions = Question::where('product_id', 29)->get();
        return view('product/category/heatTransfer/OP15A', compact('questions'));
    }

    function OP305S(){
        return view('product/category/heatTransfer/OP305S') 
        ;
    }

    function OP15A4(){
        return view('product/category/heatTransfer/OP15A4') 
        ;
    }

    function OS5R(){
        return view('product/category/heatTransfer/OS5R') 
        ;
    }

    function OP54A(){
        return view('product/category/heatTransfer/OP54A') 
        ;
    }

    function OP251(){
        return view('product/category/heatTransfer/OP251') 
        ;
    }

    function OP105A(){
        return view('product/category/heatTransfer/OP105A') 
        ;
    }

    function OP38AII(){
        return view('product/category/heatTransfer/OP38AII') 
        ;
    }

    function OP5288(){
        return view('product/category/heatTransfer/OP5288') 
        ;
    }

    // <*--------  黏合 -----------*>

    function OP450GS(){
        $questions = Question::where('product_id', 30)->get();
        return view('product/category/fusingPress/OP450GS', compact('questions'));
    }
    
    function OP1200NL(){
        $questions = Question::where('product_id', 31)->get();
        return view('product/category/fusingPress/OP1200NL', compact('questions'));
    }

    function OP1400(){
        $questions = Question::where('product_id', 32)->get();
        return view('product/category/fusingPress/OP1400', compact('questions'));
    }
    
    function OP1000NE(){
        return view('product/category/fusingPress/OP1000NE') 
        ;
    }

    function OP600N(){
        return view('product/category/fusingPress/OP600N') 
        ;
    }

    function OP60LN(){
        return view('product/category/fusingPress/OP60LN') 
        ;
    }

    function OP600SP(){
        return view('product/category/fusingPress/OP600SP') 
        ;
    }

    function OP100LE(){
        return view('product/category/fusingPress/OP100LE') 
        ;
    }

    function OP600SPII(){
        return view('product/category/fusingPress/OP600SPII') 
        ;
    }

    function OP900A(){
        $questions = Question::where('product_id', 46)->get();
        return view('product/category/fusingPress/OP900A', compact('questions'));
    }

    function OP600FA(){
        return view('product/category/fusingPress/OP600FA') 
        ;
    }

    function Feeder(){
        return view('product/category/fusingPress/Feeder') 
        ;
    }

    // <*--------  無縫黏合 -----------*>

    function MB9018B(){
        $questions = Question::where('product_id', 33)->get();
        return view('product/category/seamless/MB9018B', compact('questions'));
    }

    function OP114(){
        $questions = Question::where('product_id', 34)->get();
        return view('product/category/seamless/OP114', compact('questions'));
    }

    function OP114S(){
        $questions = Question::where('product_id', 35)->get();
        return view('product/category/seamless/OP114S', compact('questions'));
    }

    function OP701HAS(){
        return view('product/category/seamless/OP701HAS') 
        ;
    }

    function OP11403(){
        return view('product/category/seamless/OP11403') 
        ;
    }

    function OP11406(){
        return view('product/category/seamless/OP11406') 
        ;
    }

    function OP11416(){
        return view('product/category/seamless/OP11416') 
        ;
    }

    function OP115(){
        return view('product/category/seamless/OP115') 
        ;
    }

    function OP11402(){
        return view('product/category/seamless/OP11402') 
        ;
    }

    function OP115CSN(){
        return view('product/category/seamless/OP115CSN') 
        ;
    }

    function OP11512T(){
        return view('product/category/seamless/OP11512T') 
        ;
    }

    function OP806A(){
        return view('product/category/seamless/OP806A') 
        ;
    }

    

    // <*--------  包裝 -----------*>

    function OFC1(){
        return view('product/category/packaging/OFC1') 
        ;
    }

    function OFC450(){
        return view('product/category/packaging/OFC450') 
        ;
    }

    function OSZ50(){
        return view('product/category/packaging/OSZ50') 
        ;
    }

    function OSZK02(){
        return view('product/category/packaging/OSZK02') 
        ;
    }

    function OSZ50X(){
        return view('product/category/packaging/OSZ50X') 
        ;
    }

    function OSZ50N(){
        return view('product/category/packaging/OSZ50N') 
        ;
    }

    function OSZ50XN(){
        return view('product/category/packaging/OSZ50XN') 
        ;
    }
    // <*--------  金屬、重量檢測 -----------*>
    
    // 成衣
    function ON688CD5(){
        $questions = Question::where('product_id', 45)->get();
        return view('product/category/needleWeighing/clothing/ON688CD5', compact('questions'));
    }

    function OMW600(){
        return view('product/category/needleWeighing/clothing/OMW600') 
        ;
    }

    function ON30(){
        return view('product/category/needleWeighing/clothing/ON30') 
        ;
    }

    function ON688P(){
        return view('product/category/needleWeighing/clothing/ON688P') 
        ;
    }
    //食品
    function CWL300(){
        return view('product/category/needleWeighing/FoodBeverage/CWL300') 
        ;
    }
    function MD400(){
        return view('product/category/needleWeighing/FoodBeverage/MD400') 
        ;
    }
    function CW150(){
        return view('product/category/needleWeighing/FoodBeverage/CW150') 
        ;
    }

    //一般大眾

    function ON003(){
        return view('product/category/needleWeighing/General/ON003') 
        ;
    }

    // <*--------  鍋爐 -----------*>

    // 電蒸氣
    function WDR(){
        return view('product/category/Boiler/ElectricSteam/WDR') 
        ;
    }
    function LDR(){
        return view('product/category/Boiler/ElectricSteam/LDR') 
        ;
    }

    //燃氣

    function WNS(){
        return view('product/category/Boiler/GasFired/WNS') 
        ;
    }
    function WNSInternal(){
        return view('product/category/Boiler/GasFired/WNSInternal') 
        ;
    }
    function LSS(){
        return view('product/category/Boiler/GasFired/LSS') 
        ;
    }
    function CWNS(){
        return view('product/category/Boiler/GasFired/CWNS') 
        ;
    }
    function CWNSJ(){
        return view('product/category/Boiler/GasFired/CWNSJ') 
        ;
    }
    
    //燃油

    function Oil_WNSInternal(){
        return view('product/category/Boiler/OilFired/WNSInternal') 
        ;
    }
    function Oil_LSS(){
        return view('product/category/Boiler/OilFired/LSS') 
        ;
    }
    function Oil_CWNS(){
        return view('product/category/Boiler/OilFired/CWNS') 
        ;
    }
    function Oil_CWNSJ(){
        return view('product/category/Boiler/OilFired/CWNSJ') 
        ;
    }

    //生物質

    function Bio_WNS(){
        return view('product/category/Boiler/Biomass/WNS') 
        ;
    }
    function Bio_LSS(){
        return view('product/category/Boiler/Biomass/LSS') 
        ;
    }
    function Bio_LSG(){
        return view('product/category/Boiler/Biomass/LSG') 
        ;
    }
    function Bio_DZL(){
        return view('product/category/Boiler/Biomass/DZL') 
        ;
    }
    function Bio_SZL(){
        return view('product/category/Boiler/Biomass/SZL') 
        ;
    }
    function Bio_BMF(){
        return view('product/category/Boiler/Biomass/BMF') 
        ;
    }

    //燃煤

    function Coal_DZL(){
        return view('product/category/Boiler/CoalFired/DZL') 
        ;
    }
    function Coal_SZL(){
        return view('product/category/Boiler/CoalFired/SZL') 
        ;
    }


    // <*--------  其他機械 -----------*>

    function ON5(){
        return view('product/category/others/ON5') 
        ;
    }
    function ONCM(){
        return view('product/category/others/ONCM') 
        ;
    }

    function WLS301(){
        return view('product/category/others/WLS301') 
        ;
    }
    function OM78(){
        return view('product/category/others/OM78') 
        ;
    }
    function OB201L(){
        return view('product/category/others/OB201L') 
        ;
    }
    function OP408S(){
        return view('product/category/others/OP408S') 
        ;
    }
    function OP747(){
        return view('product/category/others/OP747') 
        ;
    }
    function OW40(){
        return view('product/category/others/OW40') 
        ;
    }
    function DSFS(){
        return view('product/category/others/DSFS') 
        ;
    }
    function OP102A(){
        return view('product/category/others/OP102A') 
        ;
    }
   

    
}
