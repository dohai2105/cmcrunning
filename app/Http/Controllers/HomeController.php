<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DiDom\Document;

class HomeController extends Controller
{
    private $_cookie = '';
    private $_detailRankURL = 'https://84race.com/team/detail_ranking/';
    private $_individualRankURL = 'https://84race.com/races/getranking/1833/1';
    private $_teamRankURL = 'https://84race.com/team/ranking_team/1833';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application detail Ranking.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Return json of detail Ranking.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detailRanking($teamId)
    {
        $userList = $this->_getDetailRank($teamId);
        return $userList;
    }

    /**
     * Return json of individual Raking.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function individualRanking()
    {
        $userList = $this->_getIndividualRank();
        return $userList;
    }

    /**
     * Return json of individual Raking.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function teamRanking()
    {
        $teamList = $this->_getTeamRank();
        return $teamList;
    }

    private function _getDetailRank($teamId) {
        $url = $this->_detailRankURL . $teamId;
        $options = array(
            'http' => array(
                 'method'  => 'POST',
             )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) { 
            throw new \Exception('die at detailRank API');
        }

        return $this->_parseHTMLFromDetailRank($result);
    }

    private function _getIndividualRank() {
        $url = $this->_individualRankURL;
        $options = array(
            'http' => array(
                 'method'  => 'POST',
             )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) { 
            throw new \Exception('die at detailRank API');
        }
        return $this->_parseHTMLFromIndividualRank($result);
    }

    private function _getTeamRank() {
        $url = $this->_teamRankURL;
        $options = array(
            'http' => array(
                 'method'  => 'GET',
             )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) { 
            throw new \Exception('die at detailRank API');
        }

        return $this->_parseHTMLFromTeamRank($result);
    }

    private function _parseHTMLFromDetailRank($result) {
        $dom = new Document($result);

        $trs = $dom->find('tr');
        $userList = [];
        foreach ($trs as $i => $tr) {
            if($i == 0){
                continue;
            }

            $user = [];
            $tds = $tr->find('td');
            foreach ($tds as $i => $td) {
                if($i == 0){
                    continue;
                }
                switch ($i) {
                    case 1: 
                        $user['id'] = $td->text();
                        break;
                    case 2:
                        $user['name'] = $td->text();
                        $user['imgUrl'] = $td->find('img')[0]->getAttribute('src');
                        break;
                    case 3:
                        $user['sex'] = $td->text();
                        break;
                    case 4:
                        $user['runDistance'] = $td->text();
                        break;
                }
            }
            $userList [] = (object) $user;

        }
        usort($userList, function($a, $b) {
            return (float)$a->runDistance < (float)$b->runDistance;
        });

        foreach($userList as $i => $user) {
            $user->rank = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
        }
        return $userList;
    }

    private function _parseHTMLFromTeamRank($result) {
        $dom = new Document($result);

        $trs = $dom->find('tr');
        $teamList = [];
        foreach ($trs as $i => $tr) {
            if($i == 0){
                continue;
            }

            $team = [];
            $tds = $tr->find('td');
            foreach ($tds as $i => $td) {
                if($i == 0){
                    continue;
                }
                switch ($i) {
                    case 1: 
                        $team['teamName'] = $td->text();
                        $team['teamId'] = $td->find('a')[0]->getAttribute('data-id');
                        break;
                    case 2:
                        $team['memNums'] = $td->text();
                        break;
                    case 3:
                        $team['sumDistance'] = $td->text();
                        break;
                    case 4:
                        $team['averageDistance'] = $td->text();
                        break;
                }
            }
            $teamList [] = (object) $team;

        }

        foreach($teamList as $i => $team) {
            $team->rank = $i + 1;
        }
        return $teamList;
    }

    private function _parseHTMLFromIndividualRank($result) {
        $dom = new Document($result);

        $trs = $dom->find('tr');
        $userList = [];
        foreach ($trs as $i => $tr) {
            $user = [];
            $tds = $tr->find('td');
            foreach ($tds as $i => $td) {
                if($i == 0){
                    continue;
                }
                switch ($i) {
                    case 1: 
                        $user['idLink'] = $td->find('a')[0]->getAttribute('href');
                        $user['imgUrl'] = $td->find('img')[0]->getAttribute('src');

                        break;
                    case 2:
                        $user['name'] = $td->text();
                        break;
                    case 3:
                        $user['selfDistance'] = $td->text();
                        break;
                    case 4:
                        $user['contestDistance'] = $td->text();
                        break;
                    case 5:
                        $user['team'] = $td->text() !== '' ? $td->text(): 'vô gia cư';
                        break;
                    case 6:
                        $user['finishPercent'] = $td->text();
                        break;
                }
            }
            $userList [] = (object) $user;
        }
        usort($userList, function($a, $b) {
            return (float)$a->selfDistance < (float)$b->selfDistance;
        });

        foreach($userList as $i => $user) {
            $user->rank = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
        }
        return $userList;
    }
}
