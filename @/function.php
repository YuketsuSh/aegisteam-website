<?php

error_reporting(0);
ini_set("display_errors", "Off");

class User {
    function isAdmin($bdd){
        $sql = $bdd->prepare("SELECT `ranks` FROM `users` WHERE `id` = :id");
        $sql->execute(array(':id' => $_SESSION['id']));
        $rank = $sql->fetchColumn(0);

        if ($rank == 69){
            return true;
        }else{
            return false;
        }
    }

    function LoggedIn(){
        if (isset($_SESSION['username'], $_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    function getRealIP(){
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
        }elseif (!empty($_SERVER['HTTP_X_REAL_IP'])){
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}


class Stats {

    function totalWorks($bdd)
    {

        $sql = $bdd->prepare("SELECT COUNT(*) FROM `works` WHERE `id`");
        $sql->execute();
        return $sql->fetchColumn(0);

    }

    function totalProjectsVisited($bdd){
        $sql = $bdd->prepare("SELECT SUM(show_projects) FROM stats");
        $sql->execute();
        $totalVisits = $sql->fetchColumn();

        if (!$totalVisits) {
            return 0;
        }

        if ($totalVisits < 1000) {
            return $totalVisits;
        } elseif ($totalVisits < 1000000) {
            return round($totalVisits / 1000, 1) . 'K';
        } else {
            return round($totalVisits / 1000000, 1) . 'M';
        }

    }

    function totalTeam($bdd){
        $sql = $bdd->prepare("SELECT COUNT(*) FROM `users` WHERE `id`");
        $sql->execute();
        return $sql->fetchColumn(0);
    }

}
