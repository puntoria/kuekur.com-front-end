<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Event;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify attendees';

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
        $hours = [
            24 => array('email'),
            3  => array('email', 'sms')
        ];

        foreach($hours as $hour => $methods){
            $time = Carbon::now()->addHours($hour)->second(0);
            $events = Event::where('start', $time );

            foreach($events as $event){
                
                $attendees = $event->attendedUsers;

                foreach( $attendees as $attendee ){

                    if( in_array('email', $methods) ){
                        $this->emailNotification( $attendee, $event, $hour );
                    }

                    if( in_array('sms', $methods) ){
                        $this->smsNotification( $attendee, $event, $hour );
                    }

                }

            }

        }

    }

    private function emailNotification( $user, $event, $hours ){
        Mail::queue('emails.notification', compact('user','event','hours') , function ($message) use ($user, $event){
            $message->to( $user->email, $user->name )->subject('Upcoming Event: '.$event->name);
        });
    }

    private function smsNotification( $user, $event, $hours ){
        SMS::send('sms.notification', [], function($sms) use ($user) {
            $sms->to( $user->phone );
        });
    }
}
