<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        \Validator::extend('recurring_data', function($attribute, $value, $parameters, $validator) {
            $time_validator = '/^(([0-1][0-9])|([2][0-3])):([0-5][0-9])$/';

            $data = json_decode($value, true);

            $week_days = array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');

            foreach($data as $day => $day_data){

                if( !in_array($day, $week_days) ){
                    return false;
                }

                if( !isset($day_data['start']) || !is_string($day_data['start']) ){
                    return false;
                }

                foreach($day_data as $day_data_key => $day_data_value){
                    if( !in_array( $day_data_key, ['start','end'] ) ){
                        return false;
                    }
                }

                if( !preg_match($time_validator, $day_data['start']) ){
                    return false;
                }

                if( isset($day_data['end']) ){

                    if( !is_string($day_data['end']) || !preg_match($time_validator, $day_data['end']) ){
                        return false;
                    }

                }

            }

            return true;

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
