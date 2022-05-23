<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PlayGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play:game {--usersNumber}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $computerNumber = mt_rand(1, 10);
        $usersNumber = $this->ask('Введите число от 1 до 10');

        if($usersNumber > 10 || $usersNumber < 1){
            $usersNumber = $this->ask('Введите число от 1 до 10!!!');
        }

        if($computerNumber > $usersNumber){
            $this->error("Вы проиграли, число $usersNumber < $computerNumber");
        }elseif($computerNumber < $usersNumber){
            $this->info("Поздравляю, число $usersNumber > $computerNumber");
        }else{
            $this->line("Ничья");
        }

        return 0;
    }
}
