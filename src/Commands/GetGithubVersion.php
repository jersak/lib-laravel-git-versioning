<?php

namespace Jersak\Versioning\Commands;

use Jersak\Versioning\GithubHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GetGithubVersion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github:getversion
                            {--S|sha= : Version SHA}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve version information from github';

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
        $this->info("Retrieving version information and saving to file.... \n");

        $tag = app('Jersak\Versioning\GithubHelper')->retrieveTag($this->option('sha'));

        if (isset($tag['error'])) {
            $this->error($tag['error']);
            return false;
        }

        $result = [
            'version' => $tag,
            'date' => date("d-m-Y h:i:sa", strtotime('now')),
            ];

        $encoded = json_encode($result, JSON_PRETTY_PRINT);

        $file = 'version.json';

        if (!Storage::put($file, $encoded)) {
            $this->error('Error writing to file.');
            return false;
        }
        
        $this->info("Version successfully written to file.\n");
        return false;
    }
}
