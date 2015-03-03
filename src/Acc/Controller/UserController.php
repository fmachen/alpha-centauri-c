<?php

namespace Acc\Controller;

class UserController extends AbstractController {

    public function loginAction() {
        $name = $this->app['request']->get('name');
        $password = $this->app['request']->get('password');
        $user = new \Acc\Entity\User();
        if ($name && $password) {
            $repo = new \Acc\Repository\UserRepository();
            $user = $repo->findOneBy([
                'name' => $name,
                'password' => $password
            ]);
            if ($user) {
                $this->app['session']->set('user', $user);
                $this->app['session']->getFlashBag()->add('success', 'Connected.');
            } else {
                $this->app['session']->set('user', new \Acc\Entity\User());
                $this->app['session']->getFlashBag()->add('error', 'Login error.');
                $user = new \Acc\Entity\User();
            }
        }
        return $this->app['twig']->render('user/login.html.twig', array(
                    'user' => $user
        ));
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
    }

    public function logoutAction() {
        $this->app['session']->set('user', new \Acc\Entity\User());
        $this->app['session']->getFlashBag()->add('info', 'You are disconnected.');
        return $this->app->redirect('login');
    }

    public function registerAction() {
        $user = $this->app['session']->get('user');
        return $this->app['twig']->render('user/register.html.twig', array(
                    'user' => $user
        ));
    }

    public function profileAction() {
        $user = $this->app['session']->get('user');
        return $this->app['twig']->render('user/profile.html.twig', array(
                    'user' => $user
        ));
    }

}
