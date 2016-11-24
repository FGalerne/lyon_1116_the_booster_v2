<?php

namespace BoosterBundle\Repository;

/**
 * Class SendMessageRepository
 * @package BoosterBundle\Repository
 */
class SendMessageRepository
{
    public function contact($name, $surname, $To, $email, $subject, $message, $type)
    {
        $sendMessage = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($email)
            ->setTo($To)
            ->setBody('<html>' .
                '<head></head>' .
                '<body>' .
                '<h4>Type : '.$type.
                '</h4>' .
                '<p><strong>Nom et prénom :</strong> '.$name.' '.$surname .
                '<br><strong>Mail de contact :</strong> '. $email.
                '<br><br><strong>Sujet :</strong> '.$subject.
                '<br><strong>Message :</strong> '.
                $message.
                '</body>' .
                '</html>',
                'text/html');

        return $sendMessage;
    }
}
