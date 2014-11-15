<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
     return View::make('loginForm');
});

Route::get('login', function()
{
    return View::make('loginForm');
});

Route::get('admin', array('before' => 'auth', function()
{
    return View::make('adminPage');
}));

Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to('/');
});

Route::post('/', 'HomeController@user');

Route::resource('topics', 'TopicController');

Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('getTopics', 'TopicAPIController');
});


Response::macro('xml', function($vars, $status = 200, array $header = array(), $rootElement = 'response', $xml = null)
{

    if (is_object($vars) && $vars instanceof Illuminate\Support\Contracts\ArrayableInterface) {
        $vars = $vars->toArray();
    }

    if (is_null($xml)) {
        $xml = new SimpleXMLElementExtended('<' . $rootElement . '/>');
    }
    foreach ($vars as $key => $value) {
        if (is_array($value)) {
            if (is_numeric($key)) {
                Response::xml($value, $status, $header, $rootElement, $xml->addChild(str_singular($xml->getName())));
            } else {                
                Response::xml($value, $status, $header, $rootElement, $xml->addChild($key));
            }
        } else {
            $xml->addChildWithCDATA($key,$value);
        }
    }
    if (empty($header)) {
        $header['Content-Type'] = 'application/xml';
    }
    return Response::make($xml->asXML(), $status, $header);
});

  Class SimpleXMLElementExtended extends SimpleXMLElement {

  /**
   * Adds a child with $value inside CDATA
   * @param unknown $name
   * @param unknown $value
   */
  public function addChildWithCDATA($name, $value = NULL) {
    $new_child = $this->addChild($name);

    if ($new_child !== NULL) {
      $node = dom_import_simplexml($new_child);
      $no   = $node->ownerDocument;
      $node->appendChild($no->createCDATASection($value));
    }

    return $new_child;
  }
}