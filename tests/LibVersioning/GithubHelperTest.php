<?php

namespace Jersak\Tests\Versioning;

use Jersak\Tests\Versioning\AbstractTestCase;

class GithubHelperTest extends AbstractTestCase
{
    public function testRetrieveExistingTag()
    {

        $tag = app('Jersak\Versioning\GithubHelper')->retrieveTag('2cba201257c56400a77b12b5b635da97629cd286');

        $this->assertEquals($tag, '0.1');
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
