<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Text;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'User';
     public function resetPassword($user)
    {
        $this
            ->subject('Reset Password')
            ->to($user->email)
            ->set(['token' => $user->token]);
    }


    public function implementedEvents()
	{
	    return [
	        'Model.afterSave' => 'onRegistration',
	    ];
	}

	public function onRegistration(Event $event, Entity $entity, ArrayObject $options)
	{
	    if ($entity->isNew()) {
	         $this->send('welcome', [$entity]);
	    }
	}
}
