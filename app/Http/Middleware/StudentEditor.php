<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(isset($_POST['Submit'])) {
            $student = new Student();
            switch ($_POST['Submit']){
                case 'edit':
                    $student->edit($_POST['_id'], $_POST['_fullname'], $_POST['_birthday'], $_POST['_address']);
                    break;
                case 'add':
                    $student->add($_POST['_fullname'], $_POST['_birthday'], $_POST['_address']);
                    break;
                default:
                    break;
            }
            if (!isset($_SESSION)) {
                session_start();
            }
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_SESSION['postdata'] = $_POST;
                unset($_POST);
                header("Location: ".$_SERVER['PHP_SELF']);
            exit;
            }
            // This code can be used anywhere you redirect your user to using the header("Location: ...")
            if (array_key_exists('postdata', $_SESSION)) {
            // Handle your submitted form here using the $_SESSION['postdata'] instead of $_POST
    
            // After using the postdata, don't forget to unset/clear it
            unset($_SESSION['postdata']);
            }
        }
        return $next($request);
    }
}
