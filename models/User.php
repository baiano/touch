<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 *
 * @property User|null $user
 *
 */
class User extends Model
{
    public $username;
    public $avatar;
    public $following;
    public $followers;
    public $email;
    public $bio;

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser($userName)
    {
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/users/' . $userName); 

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch);

        if (isset($output->message) && $output->message == 'Not Found'){
            return ['error' => 'User not found!'];
        }
        else{
            $user = json_decode($output, true);
        }
        // close curl resource to free up system resources 
        curl_close($ch);      
        
        if (isset($user['message'])){
            return [];
        }
        $this->username  = $userName;
        $this->avatar    = empty($user['avatar_url']) ? 'http://placehold.it/300x300' : $user['avatar_url'];
        $this->following = $user['following'];
        $this->followers = $user['followers'];
        $this->email     = empty($user['email']) ? 'Not provided' : $user['email'];
        $this->bio       = $user['bio'];

        return $this;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getRepos($userName)
    {
        $repos = new Repos();
        $repos = $repos->getRepos($userName);
        return $repos;
    }
}