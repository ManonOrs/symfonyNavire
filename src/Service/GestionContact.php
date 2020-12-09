<?php


namespace App\Service;

use App\Entity\Message;
use App\Form\MessageType;
use \Mailjet\Resources;
use Mailjet\Client;

class GestionContact {
//    private \Mailjet $mail;
//    private Environement $environementTwig;
//    private ManagerRegistry $doctrine;
//    private MessageRepository $repo;
    
//    function __construct(\Mailjet $mail, Environement $environementTwig, ManagerRegistry $doctrine, MessageRepository $repo) {
//        $this->mail = $mail;
//        $this->environementTwig = $environementTwig;
//        $this->doctrine=$doctrine;
//        $this->repo=$repo;
//    }
//
//    public function envoieMailContact(Message $message) {
//        //$titre = ($contact=>getTitre() == 'M') ? ('Monsieur') : ('Madame');
//        $email = (new \Mailjet_Message('Demande de renseignement'))
//                ->setForm([$message->getMail()=>'Nouvelle demande'])
//                ->setTo(['manon.orsini5@gmail.com'=> 'Benoit Roche Symfony']);
//        $email->SetBody(
//                $this->environementTwig->render(
//                        'mail/mail.html.twig',
//                        ['message' =>$message]
//                    ),
//                    'text/html'
//            );
//        $email->attach(\Mailjet_Attachment::formPath('documents/presentation.pdf'));
//        $this->mail->send($email);
//    }
    
    function sendEmailWithAttachments(Message $message)
{
    $mj = new Client('528c38c29c8461294e297ce4ab1a4d79','58150305399265996fccf6fba9b77777',true,['version' => 'v3.1']);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "manon.orsini5@gmail.com",
          'Name' => "Manon"
        ],
        'To' => [
          [
            'Email' => $message->getMail(),
            'Name' => $message->getNom(),
          ]
        ],
        'Subject' => "Demmande de renseignement",
        'TextPart' => $message->getMessage(),
        'HTMLPart' => "<h3>Demande de contact</h3>

<p>
    Message reçu de " . $message->getNom() . " " . $message->getPrenom() . " !
</p>
<p>
    mail: " . $message->getMail() . "
</p>
<br>
Mesage :
<p>
    " . $message->getMessage() . "
</p>",
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success();
}
    
}