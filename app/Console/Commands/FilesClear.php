<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Cloud\GoogleDrive;

class FilesClear extends Command
{
    protected $googleDrive;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drive:clear-useless-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * FilesClear constructor.
     *
     * @param GoogleDrive $googleDrive
     */
    public function __construct(GoogleDrive $googleDrive)
    {
        parent::__construct();
        $this->googleDrive = $googleDrive
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         $files = $this->googleDrive->fetchAllFiles();
    }
}
