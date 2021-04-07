<?php

namespace App\Console\Commands;

use App\Models\Requests;
use Carbon\Carbon;
use Illuminate\Console\Command;


class ArchiveBeforeToday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'requestsArchive:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Archive (change status) all requests rows before today';

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
     * @return int
     */
    public function handle()
    {
        $this->info(Carbon::today()->toString());
        $obModels = Requests::whereDate('coming_at',  '<', Carbon::today())->where(['status', ['not' => 'Выполнено']])->get();
        $intCount = $obModels->count();
        foreach ($obModels as $obModel) {
            $obModel->archive();
        }
    }
}
