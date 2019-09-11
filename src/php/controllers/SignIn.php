<?php

namespace tranber\controllers;

use tranber\structures\Controller;
use tranber\views\SignIn as SignInView;
use tranber\functions as fn;

class SignIn extends Controller implements SignInInterface
{
	public function run()
	{
        if ($model = $this->app->getModel('Users'))
		{
            $login      = $_POST['login']    ?? null;
            $password   = $_POST['password'] ?? null;

            if($login && $password)
            {
                
                
                $user       = $model->logIn($login,$password);

                if($user)
                {
                    $client = Client::getInstance();
                    $client->logIn($user);

                    $conf    = $this->app->getConf();
					$data    = $conf->getData();
					$siteUrl = $data['site-url'];
					header('Location: '.$siteUrl);


                    //connecter l'utilisateur
                    //puis le rediriger
                }
                else
                {
                    echo fn\htmlError('Identifiant et/ou mdp invalide');
                }
            }
        }



		$view = new SignInView;
		$view->stringify();
	}
}