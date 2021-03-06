<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Session;

class Filter
{
     private $session;

     public function __construct(Store $session)
     {
          $this->session = $session;
     }

     /**
      * Handle an incoming request.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \Closure  $next
      * @return mixed
      */
     public function handle($request, Closure $next)
     {
          $posts = $this->getViewedPosts();

          if (!is_null($posts)) {
               $posts = $this->cleanExpiredViews($posts);
               $this->storePosts($posts);
          }

          return $next($request);
     }

     private function getViewedPosts()
     {
          return $this->session->get('view', null);
     }

     private function cleanExpiredViews($posts)
     {
          $time = time();

          // Let the views expire after one hour.
          $throttleTime = 3600;

          return array_filter($posts, function ($timestamp) use ($time, $throttleTime) {
               return ($timestamp + $throttleTime) > $time;
          });
     }

     private function storePosts($posts)
     {
          $this->session->put('view', $posts);
     }
}
