<?php

namespace App\Console\Commands;

use App\Events\RemainingTimeChanged;
use App\Events\WinnerNumberGenerated;
use Illuminate\Console\Command;

class GameExecutor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:execute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts the game';

    private static $time = 15;

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
    public static function handle()
    {
        while (true) {
            event(new RemainingTimeChanged(self::$time . 's'));

            self::$time--;
            sleep(1);

            if (self::$time === 0) {
                self::$time = 'Waiting to start';

                event(new RemainingTimeChanged(self::$time));
                event(new WinnerNumberGenerated(mt_rand(1, 12)));

                sleep(5);

                self::$time = 15;
            }
        }
    }
}
