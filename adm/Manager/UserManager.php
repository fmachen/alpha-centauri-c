<?php

namespace Manager;

class UserManager {

    public function login() {
        \View\AdminBasic::displayHeader('Login');
        echo 'login';
        \View\AdminBasic::displayFooter();
    }

    public function logout() {
        \View\AdminBasic::displayHeader('Login');
        echo 'logout';
        \View\AdminBasic::displayFooter();
    }

}
