<?php
namespace App\User;

/**
 * Class UnrelatedTrait
 * @package App\User
 *
 * Test Trait that should not be
 * recognized by ORM
 */
trait UnrelatedTrait {

    protected $foo = 'bar';

} 