<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 *
 * @property Repo|null $repo
 *
 */
class Repos extends Model
{
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getRepos($userName)
    {
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/users/' . $userName . '/repos'); 

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch);

        if (isset($output->message) && $output->message == 'Not Found'){
            return ['error' => 'Repo not found!'];
        }
        else{
            $repos = json_decode($output, true);
        }
        // close curl resource to free up system resources 
        curl_close($ch);      
        $allRepositories = [];
        foreach ($repos as $key => $repo){
            $allRepositories[$key]['name']      = $repo['name'];
            $allRepositories[$key]['fullName']  = $repo['full_name'];
            $allRepositories[$key]['htmlUrl']   = $repo['html_url'];
            $allRepositories[$key]['stars']     = $repo['stargazers_count'];
        }
        return $allRepositories;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getRepoDetails($userName, $repo)
    {
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/' . $userName . '/' . $repo); 

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch);

        if (isset($output->message) && $output->message == 'Not Found'){
            return ['error' => 'Repo not found!'];
        }
        else{
            $repo = json_decode($output, true);
        }
        // close curl resource to free up system resources 
        curl_close($ch);      
        $row = [];
        $row['name'] = $repo['name'];
        $row['description'] = $repo['description'];
        $row['stars'] = $repo['stargazers_count'];
        $row['language'] = $repo['language'];
        $row['url'] = $repo['html_url'];
        
        return $row;
    }
}