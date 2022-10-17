<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentDelete
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
        if (isset($_GET['id'])){
            // $result = confirm("Want to delete?");
            // if ($result) {
                //Logic to delete the item
                $student = new Student();
                $student->del($_GET['id']);
            // }
            return redirect('student');
        }
        return $next($request);
    }
}
