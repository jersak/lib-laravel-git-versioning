<?php

namespace Jersak\Versioning;

use Illuminate\Support\Facades\Storage;

class GithubHelper
{
    private $client;

    public function __construct(\Github\Client $client)
    {
        $this->client = $client;
    }

    public function retrieveTag($sha)
    {
        if (!getenv('GITHUB_TOKEN') || !getenv('GITHUB_REPO_NAME')) {
            return (["error" => "Missing GitHub credentials. Please check your .env file."]);
        }

        $this->client->authenticate(env('GITHUB_TOKEN'), null, $this->client::AUTH_HTTP_TOKEN);

        try {
            $tags = $this->client->api('gitData')->tags()->all(env('GITHUB_ORG_NAME'), env('GITHUB_REPO_NAME'));
        } catch (\Exception $e) {
            return (["error" => $e->getMessage()]);
        }

        foreach ($tags as $tag) {
            if ($tag['object']['sha'] == $sha) {
                return trim($tag['ref'], "refs/tags/");
            }
        }

        return $sha;
    }
}
