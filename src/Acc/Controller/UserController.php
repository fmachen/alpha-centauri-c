<?php

namespace Acc\Controller;

class UserController extends AbstractController {

    public function loginAction() {
        $name = $this->app['request']->get('name');
        $password = $this->app['request']->get('password');
        if ($name && $password) {
            $repo = new \Acc\Repository\UserRepository();
            $user = $repo->findOneBy([
                'name' => $name,
                'password' => $password
            ]);
            if ($user) {
                $this->app['session']->set('user', $user);
                echo 'ok';
            } else {
                $this->app['session']->set('user', new \Acc\Entity\User());
                echo 'ko';
            }
        }
        return $this->app['twig']->render('login/login.html.twig', array(
                    'name' => $name,
        ));
        return <<<HTML
<form method="post">
    <label>Username</label>
    <input type="text" name="name" value="$name">
    <label>Password</label>
    <input type="password" name="password" value="$password">
    <input type="submit">
</form>
HTML;
        /*
          $en = new \Acc\Entity\User();
          $en
          ->setId('4')
          ->setName('Test')
          ->setCanonical('test')
          ->setEmail('test')
          ->setSalt('test')
          ->setPassword('test')
          ->setCreated('2015-02-16 16:58:23')
          ->setLastLogin('2015-02-16 16:58:23')
          ;
          var_dump($repo->delete($en));
          var_dump($repo->create($en));
          var_dump($repo->update($en));
          // */
        return 'tt';
    }

    public function logoutAction() {
        $app['session']->set('user', new \Acc\Entity\User());
        return $this->app->redirect('login');
    }

}
