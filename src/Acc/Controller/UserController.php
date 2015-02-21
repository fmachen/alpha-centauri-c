<?php

namespace Acc\Controller;

class UserController {

    public function loginAction() {
        $repo = new \Acc\Repository\UserRepository();
        $res = $repo->findAllBy();
        var_dump($res);
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

        return 'tt';
    }

}
