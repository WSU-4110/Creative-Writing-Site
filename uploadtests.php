<?php
    class Content {
        public $content;

        public function setContent($content){
            $this->content = $content;
        }
    
        public function getContent(){
            return "Post content";
        }
    }

    class UploadTest extends PHPUnit_Framework_TestCase{
        //setting/getting content variable from database
        public function testSetContent(){
            
            $content = new Content;

            $content->setContent("post content");

            $this->assertEquals($content->getContent(),"post content");
        }

        public function testGetContent(){
            $content = new Content;

            $content->getContent("post content");

            $this->assertEquals($content->setContent(),"post content");
        }

        //setting/getting title from database
        public function testSetTitle(){
            $title = new Title;

            $title->setTitle("title of post");

            $this->assertEquals($title->getTitle(),"title of post");
        }

        public function testGetTitle(){
            $title = new Title;

            $title->getTitle("title of post");

            $this->assertEquals($title->setTitle(),"title");
        }

        //setting/getting tags from database
        public function testSetTags(){
            $tags = new Tags;

            $tags->getContent("post tags");

            $this->assertEquals($tags->getTags()(),"tags");
        }

        public function testGetTags(){
            $tags = new Tags;

            $tags->getContent("post tags");

            $this->assertEquals($tags->setTags(),"post tags");
        }

        //setting/getting publicity status from database
        public function testSetPublicity(){
            $publicity = new Publicity;

            $publicity->getContent("public/private");

            $this->assertEquals($publicity->getPublicity(),"public/private");
        }

        public function testGetPublicity(){
            $publicity = new Publicity;

            $publicity->getContent("public/private");

            $this->assertEquals($publicity->setPublicity(),"public/private");
        }
    }


?>