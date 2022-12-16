<?php 

namespace App\Libraries;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Database\QueryException; 

class MemberAuth{
    
    public const HOME = '/';
    private static $member = null;

    public static function member(){
        if(  empty(self::$member) && session()->exists('memberId')){
            self::$member = Member::find(session('memberId'));
        }
        return self::$member;
    }

    public static function isLoggedIn(){
        return !empty(self::member());
 
        // return !empty(self::$member);
        // 如果這樣寫會有問題
    }

    public static function signUp(
        $name,
        $email,
        $password,
        $password_confirmation
        // Request $request

    ){

                
        if($password === $password_confirmation){
            try{
                Member::create([
                    'name'=> $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                ]);

            }catch(QueryException $e){                
                return "Email or password invalid";                
            }
            return null;
        }

        return "Password and password confirmation are not compared.";
    }

    public static function logIn($email,$password){
         
        // self::$member = Member::where([ 
        //     'email'=> $email,
        //     'password'=> $password
        // ])->first();

        // if(!empty(self::$member)){
            
        //     session(['memberId' => self::$member->id]);
        // } 

        // return redirect()->route('members.session.create');

        $_member = Member::where([ 
            'email'=> $email
        ])->first();

        if(!empty($_member)&&
           Hash::check($password,$_member->password)
        ){
            if($_member->email_verified)
            {
                self::$member = $_member; 
                session(['memberId' => self::$member->id]);
                // return redirect(MemberAuth::HOME);

            }else{
                return back()->with('fail','You need to confirm your account. We have sent you
                activation link, please check your email');
            }
             
            // if( Hash::needsRehash($_member->password)){
            //     self::$member->password = Hash::make($password);
            //     self::$member->save();
            // }
        }else{
            return back()->with('fail','This email is not registered.');
        } 
       
    }

    public static function logOut(){
        session()->forget('memberId');
        self::$member = null;
    }
}