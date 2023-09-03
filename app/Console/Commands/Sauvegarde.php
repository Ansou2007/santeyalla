<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class Sauvegarde extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:sauvegarde';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sauvegarde de la base de donnees';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = "Sauvegarde_" . Carbon::now()->format('d/m/Y') . ".sql";
        $commande = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " > " . storage_path() . "app/sauvegarde/" . $filename;
        $returnVar = NULL;
        $output  = NULL;
        exec($commande, $returnVar, $output);
    }
}
