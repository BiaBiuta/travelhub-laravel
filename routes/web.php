<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ShareController;
use PHPUnit\Framework\Attributes\PostCondition;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/profile', function () {
    $posts = app(PostsController::class)->index_json_all_profile()->getData(true)['posts'];

    // dd($posts); // true pentru a obține array asociativ
    $shares = app(ShareController::class)->index_profile()->getData(true)['shares'];
    $all = array_merge($posts, $shares);
    usort($all, function ($a, $b) {
        return
            strtotime($b['created_at']) - strtotime($a['created_at']);
    });

    return view('pages.profile', [
        'posts' => $all
    ]);
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/posts', function () {
    $posts = app(PostsController::class)->index_json_all()->getData(true)['posts'];
    // dd($posts); // true pentru a obține array asociativ
    $shares = app(ShareController::class)->index()->getData(true)['shares'];
    $all = array_merge($posts, $shares);
    usort($all, function ($a, $b) {
        return
            strtotime($b['created_at']) - strtotime($a['created_at']);
    });

    return view('pages.forum', [
        'posts' => $all
    ]);
});

Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
Route::get('/posts/index', [PostsController::class, 'index_json']);
Route::post('/posts/search', [PostsController::class, 'index_json_search'])->name('posts.search');
Route::get('/tables', function () {
    return view('pages.table');
});
Route::get('/displayDepartments', function () {
    return view('pages.display_departments');
});
Route::get('/user', [UserController::class, 'allstuff']);
Route::get('/users/data', [UserController::class, 'getData'])->name('users.data');
Route::post('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
Route::get('/users/edit/{id}', [UserController::class, 'update'])->name('users.edit');
Route::post('/users/department/edit/{id}/{departament_id}', [UserController::class, 'departmentChange'])->name('users.departmentChange');
Route::get('/users/access/{id}', [UserController::class, 'access'])->name('users.access');
Route::get('/departments/{id}', [DepartmentController::class, 'showDepartments']);

Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/create_departaments', function () {
    return view('pages.create_departments');
});
Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/upload_post', function () {
    return view('pages.upload');
});
Route::get('/chat/{id}', [CommentController::class, 'index'])->name('comment.index');
Route::post('/chat/{id}', [CommentController::class, 'store'])->name('comment.store');

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
Route::get('/comments', [CommentController::class, 'index_json']);
Route::get('/share/{id}', function ($id) {
    // dd($id);
    return view('pages.share', ["post_id" => $id]);
});
Route::post('/share', [ShareController::class, 'store']);
Route::get('/edit_post/{id}', function ($id) {
    return view('pages.edit_post_content', ["post_id" => $id]);
});
Route::get('/view_edit_post/{id}', [PostsController::class, 'find']);
Route::patch('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');
Route::delete('/delete_post/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
