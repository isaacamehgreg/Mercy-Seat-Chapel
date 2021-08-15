<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\MailController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info("Cron is working fine!");


        /*
           Write your database logic we bellow:
           Item::create(['name'=>'Ajay kumar']);
        */



        //if today is thursday
        //the hour is 5
        //run the code once and make notified to true

        $day =Carbon::today()->format('l');
        $hour = Carbon::now()->format('H');
        Log::info($day);
        if($day=='Thurday' && $hour == "5")
        {
            foreach(DB::table('slots')->where('notified',false)->get() as $slot){
                 foreach(DB::table('books')->where('slot_id',$slot->id)->get() as $person){
                    Log::info("am here");
                     //send mail and send sms
                         //send sms
                            try {
                                $to = $person->phone;
                                $from = getenv("TWILIO_FROM");
                                $message = 'Hello '.$person->first_name.',Kindly check your Email to confirm your availability for sunday service. Thank you.  _Mercy Seat Chapel';
                                //open connection

                                $ch = curl_init();

                                //set the url, number of POST vars, POST data
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($ch, CURLOPT_USERPWD, getenv("TWILIO_SID").':'.getenv("TWILIO_TOKEN"));
                                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
                                curl_setopt($ch, CURLOPT_URL, sprintf('https://api.twilio.com/2010-04-01/Accounts/'.getenv("TWILIO_SID").'/Messages.json', getenv("TWILIO_SID")));
                                curl_setopt($ch, CURLOPT_POST, 3);
                                curl_setopt($ch, CURLOPT_POSTFIELDS, 'To='.$to.'&From='.$from.'&Body='.$message);

                                // execute post
                                $result = curl_exec($ch);
                                $result = json_decode($result);
                            // dd($result);
                                // close connection
                                curl_close($ch);
                                //Sending message ends here
                            }
                            catch(Exception $e) {

                            }


                            //send mail
                            try{
                                $details = [
                                    'title' =>DB::table('slots')->where('id',$slot->id)->value('title'),
                                    'date' =>DB::table('slots')->where('id',$slot->id)->value('date'),
                                    'first_name' =>$person->first_name,
                                    'slot_id'=>$slot->id,
                                    'email'=>$person->email



                                ];

                            Mail::to($person->email)->send(new TestMail($details));
                            }catch(Exception $e){

                            }

                 }
            }

        }



    }
}
