<?php

namespace App;

use Carbon\Carbon;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use Symfony\Component\Filesystem\Filesystem;

class Libs extends MainController
{
    public function index()
    {
        echo 'hi';
    }

    public function carbon()
    {
        $davno= Carbon::now()
//            ->subDay()
//            ->subMonth(2)
//            ->addYear()
//            ->addHour()
            ->subMinute(30)
        ;
//        setlocale(LC_TIME, 'German');
        Carbon::setLocale('ru');
//
//        echo Carbon::now()->formatLocalized('%A %d %B %Y');
        echo $davno->diffForHumans(Carbon::now());
    }

    public function crawler()
    {
        $html = file_get_contents('https://bash.im');
        $crawler = new \Symfony\Component\DomCrawler\Crawler($html);
        $parsedContent = $crawler->filter('.quote .id');
        $quotes = [];
        foreach ($parsedContent as $parsed) {
            $quotes[]= $parsed->getAttribute('href');
        }
        echo json_encode($quotes);
    }

    public function swift()
    {
        $transport = (new Swift_SmtpTransport('smtp.mail.ru', 587, 'tls'))
            ->setUsername('sadasddddddddddddddd111@mail.ru')
            ->setPassword('qwerty1234')
        ;
        $mailer = new Swift_Mailer($transport);
        $message = (new Swift_Message('Subj'))
            ->setFrom(['sadasddddddddddddddd111@mail.ru' => 'sadasddddddddddddddd111'])
            ->setTo(['itvrd2@yandex.ru' => 'name'])
//            ->attach(\Swift_Attachment::fromPath(APPLICATION_PATH.'/../debug')->setFilename('test'))
            ->setBody('Privet')
        ;
        $result = $mailer->send($message);
        print_r($result);
    }
    public function twig()
    {
        $this->view->twigLoad('test2', ['test' => 'asd', 'isTest' => true]);
//        $this->view->render('test', ['test' => 'asd', 'isTest' => true]);
    }
    public function fs()
    {
        $fs = new Filesystem();
        $fs->mkdir(APPLICATION_PATH.'testdir');
        $fs->touch(APPLICATION_PATH.'test123');
        $fs->exists(APPLICATION_PATH.'test123');
        $fs->copy(APPLICATION_PATH. 'test123', APPLICATION_PATH. 'test2');
//
        $fs->remove(APPLICATION_PATH.'testdir');
        $fs->remove(APPLICATION_PATH.'test123');
        $fs->remove(APPLICATION_PATH.'test2');
        echo 'ALL DONE';
    }
    public function env()
    {
        echo getenv('DB_HOST').':'.getenv('DB_PASSWORD');
    }
}