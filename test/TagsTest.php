<?php

use CloudSearchQueryBuilder\Tags;
use CloudSearchQueryBuilder\Atom;

class TagTest
    extends PHPUnit_Framework_TestCase
{
    public function testSimpleTerm()
    {
        $tag = new Tags(function($t) { return new Atom('term', $t); });
        $tag->add('tag1');
        $this->assertEquals(
            "(term 'tag1')",
            strval($tag)
        ); 
    }

    public function testJoinTerm()
    {
        $tag = new Tags(function($t) { return new Atom('term', $t); });
        $tag->add('tag1');
        $tag->add('tag2');
        $this->assertEquals(
            "(or (term 'tag1') (term 'tag2'))",
            strval($tag)
        ); 
    }

    public function testRemoveTag()
    {
        $tag = new Tags(function($t) { return new Atom('term', $t); });
        $tag->add('tag1');
        $tag->add('tag2');
        $tag->add('tag3');
        $tag->remove('tag2');
        $this->assertEquals(
            "(or (term 'tag1') (term 'tag3'))",
            strval($tag)
        ); 
    }

    public function testRemoveAllTags()
    {
        $tag = new Tags(function($t) { return new Atom('term', $t); });
        $tag->add('tag2');
        $tag->remove('tag2');
        $this->assertEquals(
            "",
            strval($tag)
        ); 
    }

    public function testRemoveAllTagsIsEmpty()
    {
        $tag = new Tags(function($t) { return new Atom('term', $t); });
        $tag->add('tag2');
        $tag->remove('tag2');
        $this->assertTrue($tag->isEmpty()); 
    }

    public function testAddIsNotEmpty()
    {
        $tag = new Tags(function($t) { return new Atom('term', $t); });
        $tag->add('tag2');
        $this->assertFalse($tag->isEmpty()); 
    }

    public function testFluentInterface()
    {
        $tag = new Tags(function($t) { return new Atom('term', $t); });
        $this->assertInstanceOf(
            '\CloudSearchQueryBuilder\Tags',
            $tag->add('tag2')
        );
    }
}
