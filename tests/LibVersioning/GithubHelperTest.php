<?php

namespace Jersak\Tests\Versioning;

use Jersak\Tests\Versioning\AbstractTestCase;

class GithubHelperTest extends AbstractTestCase
{
    public function testRetrieveExistingTag()
    {

        $tag = app('Jersak\Versioning\GithubHelper')->retrieveTag('d030cb895c17b45375adaa5aa904cb474fd0268f');

        $this->assertEquals($tag, 'v0.1.2');
    }

    public function testRetrieveNonExistingTag()
    {

        $tag = app('Jersak\Versioning\GithubHelper')->retrieveTag('d030cb895c17b453asdasd904cbasdd0268f');

        $this->assertEquals($tag, 'd030cb895c17b453asdasd904cbasdd0268f');
    }

    public function testRetrieveTagWrongCredentials()
    {

        putenv("GITHUB_TOKEN=aaa");

        $tag = app('Jersak\Versioning\GithubHelper')->retrieveTag('d030cb895c17b453asdasd904cbasdd0268f');

        $this->assertArrayHasKey('error', $tag);
    }

    public function testRetrieveTagMissingCredentials()
    {

        putenv("GITHUB_TOKEN");

        $tag = app('Jersak\Versioning\GithubHelper')->retrieveTag('d030cb895c17b453asdasd904cbasdd0268f');

        $this->assertArrayHasKey('error', $tag);
    }
}
