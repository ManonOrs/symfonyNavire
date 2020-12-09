<?php


namespace App\Service;

class GestionContact {
    private \Swift_Mailer $mail;
    private Environement $environementTwig;
    private ManagerRegistry $doctrine;
    private MessageRepository $repo;
    
    function __construct(\Swift_Mailer $mail, Environement $environementTwig, ManagerRegistry $doctrine, MessageRepository $repo) {
        $this->mail = $mail;
        $this->environementTwig = $environementTwig;
        $this->doctrine=$doctrine;
        $this->repo=$repo;
    }

    public function envoieMailContact(Message $message) {
        //$titre = ($contact=>getTitre() == 'M') ? ('Monsieur') : ('Madame');
        $email = (new \Swift_Message('Demande de renseignement'))
                ->setForm([$message->getMail()=>'Nouvelle demande'])
                ->setTo(['manon.orsini5@gmail.com'=> 'Benoit Roche Symfony']);
        $email->SetBody(
                $this->environementTwig->render(
                        'mail/mail.html.twig',
                        ['message' =>$message]
                    ),
                    'text/html'
            );
        $email->attach(\Swift_Attachment::formPath('documents/presentation.pdf'));
        $this->mail->send($email);
    }
    
}