<?php

require __DIR__ . '/../app/Users.php';

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase {
    public function testOne() {
        $users = new Users();
        $users->add('Terrell Irving');
        $users->add('Magdalen Sara Tanner');
        $users->add('Chad Niles');
        $users->add(['Mervin Spearing', 'Dean Willoughby', 'David Prescott']);
        $result = $users->getSpecialUser();
        
        $this->assertEquals($result, 'Irving');
    }
    
    public function testTwo() {
        $users = new Users();
        $users->add('Andre Garfield');
        $users->add('Magdalen Sara Tanner');
        $users->add('Chad Niles');
        $users->add(['Mervin Spearing', 'Dean Willoughby', 'David Prescott']);
        $result = $users->getSpecialUser();
        
        $this->assertEquals($result, 'Spearing');
    }
    
    public function testThree() {
        $users = new Users();
        $users->add('Zzzzz Aaaaa');
        $users->add('Magdalen Sara Tanner');
        $users->add('Chad Niles');
        $users->add(['Mervin Spearing', 'Dean Willoughby', 'David Prescott']);
        $result = $users->getSpecialUser();
        
        $this->assertEquals($result, 'Aaaaa');
    }
    
    public function testFour() {
        $users = new Users();
        $users->add('#234 @#a');
        $users->add('Magdalen Sara Tanner');
        $users->add('Chad Niles');
        $users->add(['Mervin Spearing', 'Dean Willoughby', 'David Prescott']);
        $result = $users->getSpecialUser();
        
        $this->assertEquals($result, 'Spearing');
    }
}